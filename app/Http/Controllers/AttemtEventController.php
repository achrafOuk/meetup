<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AttemptEvent;
class AttemtEventController extends Controller
{
    //get attempted event for the user
    public function attempted_events(){
        $events = new AttemptEvent();
        //get events
        $id = auth()->id();
        $event = $events->get_attemted_event($id);
        for($i = 0; $i<count($event); $i++){
            $event1 = $event->values()->get($i);
            $path_image = explode("/", $event1->image);
            $event1->image = $path_image[count($path_image)-1];
        }
        return view('pages.attempt_events.index',[
            'events'=>$event,
        ]);
    }
    //attempt event
    public function attempt_event(Request $request)
    {
        $event = new AttemptEvent();
        //get the id of the user
        $id =  auth()->id() ;
        $event_id =  intval ( $request->id ) ;
        $event->attempt_event($id,$event_id);
        return redirect()->route('view-event',['id'=>$request->id])
        ->with('msg', 'Event is added to attempt list')
        ->with('type', 'info');

    }
    //remove attempt event
    public function cancel_attempt_event(Request $request)
    {
        $event = new AttemptEvent();
        $id = auth()->id();
        $event->cancel_attempt_event($id,$request->id);
        return redirect()->route('view-event',['id'=>$request->id])
        ->with('msg', 'Event was remove from attempt list')
        ->with('type', 'info');

    }
}
