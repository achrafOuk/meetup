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
    //view event
    function veiwEvent($id){
        $events = new Event();
        $event = $events->showEvent($id);
        $view = true;
        if(count($event)){
            return view('pages.events.index',['events'=>$event,'view'=>$view]);
        }
        else{
            return view('pages.events.index');
        }
    }
    function newEventPage(){
        return view('pages.events.add');
    }
    function newEvent(Request $request){
        $this->validate($request, [
            'title'=>'required',
            'image'=>'required',
            'date'=>'required',
            'place'=>'required',
            'description'=>'required'
        ]);
        //get the image path
        $filenameWithExt = $request->file('image')->getClientOriginalName();
        echo 'this request has image'. $filenameWithExt.'<br>';

        // Get Filename
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

        // Get just Extension
        $extension = $request->file("image")->getClientOriginalExtension();

        // Filename To store
        $fileNameToStore = $filename. "_". time().".".$extension;

        // Upload Image
        $path = $request->file("image")->storeAs("public/image", $fileNameToStore);
        $events = new Event();
        $events->addEvent(
            $request->title,
            $path,
            $request->place,
            $request->date,
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
