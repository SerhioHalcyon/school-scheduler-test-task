<?php

namespace App\Http\Controllers;

use App\Models\Bell;
use App\Models\Schedule;
use App\Models\SchoolClass;
use App\Services\Contracts\ScheduleServiceContract;
use App\Services\ScheduleService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

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
