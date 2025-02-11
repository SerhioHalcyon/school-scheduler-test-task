<?php

namespace App\Http\Controllers;

use App\Services\Contracts\ScheduleServiceContract;
use App\Services\ScheduleService;

class ScheduleController extends Controller
{
    public function __construct(
        /** @var ScheduleService $scheduleService */
        private readonly ScheduleServiceContract $scheduleService,
    ) {
        //
    }

    public function index()
    {
        $schedule = $this->scheduleService->generateSchedule();

        return view('schedule', compact('schedule'));
    }
}
