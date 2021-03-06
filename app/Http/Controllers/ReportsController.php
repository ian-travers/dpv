<?php

namespace App\Http\Controllers;

use App\Detainer;
use App\Shift;
use Carbon\Carbon;

class ReportsController extends Controller
{
    /**
     * @var Shift
     */
    private $shift;

    public function __construct(Shift $shift)
    {
        $this->shift = $shift;
    }

    public function showAtTime()
    {
        request()->validate(['time' => 'required']);

        $detainers = Detainer::all();

        $atTime = Carbon::createFromFormat('d.m.Y H:i', request('time'));

        $wagons = detainedAtAll(null, $atTime);


        return view('reports.at-time', compact('detainers', 'atTime', 'wagons'));
    }

    public function showLast()
    {
        $detainers = Detainer::all();

        $shiftStartsAt = $this->shift->getLastShiftStart();
        $shiftEndsAt = $this->shift->getLastShiftEnd();

        $wagons = wagonsDetainedForPeriod($shiftStartsAt, $shiftEndsAt);

        return view('reports.period', compact('detainers', 'wagons', 'shiftStartsAt', 'shiftEndsAt'));
    }

    public function showPrevious()
    {
        $detainers = Detainer::all();

        $shiftStartsAt = $this->shift->getPrevShiftStart();
        $shiftEndsAt = $this->shift->getPrevShiftEnd();

        $wagons = wagonsDetainedForPeriod($shiftStartsAt, $shiftEndsAt);

        return view('reports.period', compact('detainers', 'wagons', 'shiftStartsAt', 'shiftEndsAt'));
    }

    public function showCustom()
    {
        request()->validate([
            'start' => 'required',
            'end' => 'required'
        ]);

        $detainers = Detainer::all();

        $shiftStartsAt = Carbon::createFromFormat('d.m.Y H:i', request('start'));
        $shiftEndsAt = Carbon::createFromFormat('d.m.Y H:i', request('end'));

        $wagons = wagonsDetainedForPeriod($shiftStartsAt, $shiftEndsAt);


        return view('reports.period', compact('detainers', 'wagons', 'shiftStartsAt', 'shiftEndsAt'));
    }
}
