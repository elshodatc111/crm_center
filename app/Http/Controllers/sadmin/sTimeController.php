<?php

namespace App\Http\Controllers\sadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\LessenTimeRequest;
use App\Models\LessenTime;
use Carbon\Carbon;

class sTimeController extends Controller{
    public function index(){   
        $LessenTime = LessenTime::get();     
        return view('sadmin.time',compact('LessenTime'));
    }
    public function store(LessenTimeRequest $request){
        $startTime = Carbon::createFromFormat('H:i', $request->start);
        $lessonDuration = intval($request->time); 
        $lessonCount = intval($request->count); 
        for ($i = 0; $i < $lessonCount; $i++) {
            $endTime = $startTime->copy()->addMinutes($lessonDuration); 
            LessenTime::create([
                'number' => $i + 1,
                'time' => $startTime->format('H:i') . ' - ' . $endTime->format('H:i'),
            ]);
            $startTime = $endTime; 
        }
        return back()->with('success', 'Darslar muvaffaqiyatli saqlandi.');
    }
    public function delete(){
        LessenTime::truncate();
        return back()->with('success', 'Barcha dars vaqtlari o\'chirildi.');
    }
}
