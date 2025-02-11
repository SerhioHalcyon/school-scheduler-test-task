<?php

namespace App\Services;

use App\Repositories\{
    BellRepository,
    ScheduleRepository,
    SchoolClassRepository
};
use App\Services\Contracts\{
    BellRepositoryContract,
    ScheduleRepositoryContract,
    ScheduleServiceContract,
    SchoolClassRepositoryContract
};
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;

class ScheduleService implements ScheduleServiceContract
{
    public function __construct(
        /** @var ScheduleRepository $scheduleRepository */
        private readonly ScheduleRepositoryContract $scheduleRepository,
        /** @var BellRepository $bellRepository */
        private readonly BellRepositoryContract $bellRepository,
        /** @var SchoolClassRepository $bellRepository */
        private readonly SchoolClassRepositoryContract $schoolClassRepository,
    ) {
        //
    }
    public function generateSchedule(): Collection
    {
        $this->scheduleRepository->truncate();

        $days = [1, 2, 3, 4, 5];
        $bells = $this->bellRepository->all();
        $classes = $this->schoolClassRepository->getWithRelation();

        $assignedTeachers = [];
        $assignedClasses = [];

        foreach ($days as $day) {
            foreach ($classes as $class) {
                $subjects = $class->subjects;
                $subjectIndex = 0;

                foreach ($bells as $bell) {
                    if ($subjects->isEmpty()) {
                        continue;
                    }

                    $subject = $subjects[$subjectIndex % count($subjects)];
                    $subjectIndex++;

                    $teachers = $subject->teachers;

                    $availableTeachers = $teachers->filter(function ($teacher) use ($day, $bell, $assignedTeachers) {
                        return !isset($assignedTeachers[$day][$bell->id]) || !in_array($teacher->id, $assignedTeachers[$day][$bell->id]);
                    });

                    if ($availableTeachers->isEmpty()) {
                        continue;
                    }

                    $teacher = $availableTeachers->first();

                    if (isset($assignedClasses[$day][$bell->id]) && in_array($class->id, $assignedClasses[$day][$bell->id])) {
                        continue;
                    }

                    $assignedTeachers[$day][$bell->id][] = $teacher->id;
                    $assignedClasses[$day][$bell->id][] = $class->id;

                    $this->scheduleRepository->create([
                        'day' => $day,
                        'bell_id' => $bell->id,
                        'class_id' => $class->id,
                        'subject_id' => $subject->id,
                        'teacher_id' => $teacher->id,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ]);
                }
            }
        }

        $schedule = $this->scheduleRepository->getWithRelation();

        $schedule = $schedule->groupBy('day');

        return $schedule;
    }
}