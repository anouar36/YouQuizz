<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon; 

use App\Models\StatuStaf;

class StatuStafController extends Controller
{
    public function store(Request $request)
    {
        $stafId = $this->findAvailableStaf();
        
        if (!$stafId) {
            echo ' No available staff for today!';
        }
        
        // Automatically calculate new event start and end times
        list($newEventStart, $newEventEnd) = $this->calculateNewEventTimes($stafId);

        $totalHours = $this->culculeHourWork($stafId);
        
        $newStart = Carbon::parse($newEventStart);
        $newEnd = Carbon::parse($newEventEnd);
        $newEventHours = $newStart->diffInHours($newEnd);
    
        // Ensure total hours do not exceed 8, otherwise move to the next available day
        if (($totalHours + $newEventHours) > 8) {
            list($newEventStart, $newEventEnd, $stafId) = $this->switchToNextAvailableDay();
        }
    
        // Insert the new event for the staff member
        DB::table('statu_stafs')->insert([
            'staf_id' => $stafId,
            'disponibilite' => true,
            'jour' => Carbon::parse($newEventStart)->toDateString(),
            'event_date_debut' => $newEventStart,
            'event_date_fin' => $newEventEnd,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    
        echo 'Event added successfully! ' . ($totalHours + $newEventHours);
    }

    public function culculeHourWork($stafId)
    {
        $currentDate = Carbon::now()->toDateString();
        $events = DB::table('statu_stafs')
            ->where('staf_id', $stafId)
            ->where('jour', $currentDate)
            ->get();

        $totalHours = 0; 
    
        foreach ($events as $event) {
            $start = Carbon::parse($event->event_date_debut);
            $end = Carbon::parse($event->event_date_fin);
            $totalHours += $start->diffInHours($end);
        }
    
        return $totalHours;
    }

    private function calculateNewEventTimes($stafId)
    {
        $currentDate = Carbon::now()->toDateString();
        $lastEvent = DB::table('statu_stafs')
            ->where('staf_id', $stafId)
            ->where('jour', $currentDate)
            ->orderBy('event_date_fin', 'desc')
            ->first();
    
        if ($lastEvent) {
            $newEventStart = Carbon::parse($lastEvent->event_date_fin);
        } else {
            $newEventStart = Carbon::today()->setHour(9)->setMinute(0);
        }
    
        $newEventEnd = $newEventStart->copy()->addHours(2);
    
        return [$newEventStart, $newEventEnd];
    }

    private function switchToNextAvailableDay()
    {
        $nextDay = Carbon::tomorrow();
        
        while (true) {
            $availableStaf = $this->findAvailableStaf($nextDay->toDateString());
            
            if ($availableStaf) {
                $newEventStart = $nextDay->copy()->setHour(9)->setMinute(0);
                $newEventEnd = $newEventStart->copy()->addHours(2);
                return [$newEventStart, $newEventEnd, $availableStaf];
            }
            
            $nextDay->addDay();
        }
    }

    private function findAvailableStaf($date = null)
    {
        $date = $date ?? Carbon::now()->toDateString();

        $roleIdStaf = DB::table('roles')->where('nameRole', '=', 'staf')->first();
        
        $stafList = DB::table('users')
            ->select('id')->where('role_id', "=", $roleIdStaf->id)
            ->get()->toArray();
            
        foreach ($stafList as $staf) {
            $totalHours = $this->culculeHourWork($staf->id);
            if ($totalHours < 8) {
                return $staf->id;
            }
        }
        
        return null;
    }


    
}
