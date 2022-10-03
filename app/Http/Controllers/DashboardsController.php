<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Payment;
use Illuminate\Support\Facades\DB;

class DashboardsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $record = Payment::select(\DB::raw("COUNT(*) as count"), \DB::raw("DAYNAME(created_at) as day_name"), \DB::raw("DAY(created_at) as day"))
            ->where('created_at', '>', Carbon::today()->subDay(6))
            ->groupBy('day_name','day')
            ->orderBy('day')
            ->get();
        
        $per_day = Payment::select(\DB::raw("COUNT(*) as count"))->whereDate('created_at', Carbon::today())->get();

        // dd($per_day);
            
        $data = [];

        foreach($record as $row) {
            $data['label'][] = $row->day_name;
            $data['data'][] = (int) $row->count;
        }

        foreach($per_day as $row) {
            $data['chart_day'] = (int) $row->count;
        }

        $data['chart_data'] = json_encode($data);
        // dd($data);
        return view('dashboard.dashboard', $data);
    }

    public function generateDates(Carbon $startDate, Carbon $endDate, $format = 'Y-m-d')
    {
        $dates = collect();
        $startDate = $startDate->copy();

        for ($date = $startDate; $date->lte($endDate); $date->addDay()) {
            $dates->put($date->format($format), 0);
        }

        return $dates;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
