<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Event;
class PostController extends Controller
{
    function index(){
        $posts = new Event();
        $event = $posts->getEvents();
        return view('pages.events.index',[
            'events'=>$event,
        ]);
    }
    function newEventPage(){
        return view('pages.events.add');
    }
    function newEvent(Request $request){
        $this->validate($request, [
            'title'=>'required',
            'place'=>'required',
            'description'=>'required'
        ]);
        $events = new Event();
        $events->addEvent(
            $request->title,
            $request->place,
            $request->description,
            auth()->id()
        );
        return redirect()->route('index');
    }
    function editEventPage(){
    }
    function editEvent(){
    }
    function searchEvent(){
    }
    function deleteEvent(){
    }
}
