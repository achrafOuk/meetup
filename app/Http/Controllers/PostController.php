<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use App\Models\AttemptEvent;
class PostController extends Controller
{
    function index(){
        $posts = new Event();
        $event = $posts->getEvents();
        for($i = 0; $i<count($event); $i++){
            $event1 = $event->values()->get($i);
            $path_image = explode("/", $event1->image);
            $event1->image = $path_image[count($path_image)-1];
        }
        return view('pages.events.index',[
            'events'=>$event,
        ]);
    }
    // get events of the users
    function getMyEvents(){
        $posts = new Event();
        $event = $posts->getMyEvents();
        for($i = 0; $i<count($event); $i++){
            $event1 = $event->values()->get($i);
            $path_image = explode("/", $event1->image);
            $event1->image = $path_image[count($path_image)-1];
        }
        return view('pages.events.myevent',[
            'events'=>$event,
        ]);
    }
    //view event
    function veiwEvent($id){
        $events = new Event();
        $event = $events->showEvent($id);
        $view = true;
        $event1 = $event->first();
        if(count($event)){
            //get the path of the image
            $path_image = explode("/", $event1->image);
            $event1->image = $path_image[count($path_image)-1];
            //check if the visitor is the writer of the post and enable edit file
            if(  $event1->user_id == auth()->id() ){
                return view('pages.events.show',['event'=>$event1,'view'=>$view,"edit"=>true]);
            }
            $attempted_events = new AttemptEvent();
            if( $attempted_events->get_attempt_event($id)>0 ){
                return view('pages.events.show',
                ['event'=>$event1,'attempt'=>true]);
            }
            return view('pages.events.show',['event'=>$event1,'attempt'=>false]);
        }
        abort(404);
    }
    //get image from storage
    public function getPubliclyStorgeFile($filename)
    {
        // get the path of the image
        $path = storage_path('app/public/image/'. $filename);
        //check if image does not exists, show 404 page
        if (!File::exists($path)) {
            echo 'file does not exists';
            return ;
            //abort(404);
        }
        // return the image
        $file = File::get($path);
        $type = File::mimeType($path);
        $response = Response::make($file, 200);
        $response->header("Content-Type", $type);
        return $response;
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
        // get the path of the uploaded Image
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
    // add edit event
    function editEventPage($id){
        $events = new Event();
        $event = $events->showEvent($id);
        // check if user is the author of the post and make him edit the post
        if( $event->first()->user_id == auth()->id() )
        {
            $path_image = explode("/", $event->first()->image );
            $event->first()->image = $path_image[count($path_image)-1];
            //view the edit page with 
            return view('pages.events.edit',['event'=>$event->first()]);
        }
        // redirect it to the main page otherwize
        return redirect()->route('index');
    }
    function editEvent(Request $request){
        // force the data to not be null
        $this->validate($request, [
            'title'=>'required',
            'date'=>'required',
            'place'=>'required',
            'description'=>'required'
        ]);
        //get the path of new image if user select new one
        if($request->image!=''){
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            // Get Filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just Extension
            $extension = $request->file("image")->getClientOriginalExtension();
            // Filename To store
            $fileNameToStore = $filename. "_". time().".".$extension;
            // get the path of the uploaded Image
            $path = $request->file("image")->storeAs("public/image", $fileNameToStore);
        }
        //get the path of old image
        else{
            $events = new Event();
            $path = $events->getEvents()->first()->image;
        }
        $events = new Event();
        $events->editEvent(
            $request->id,
            $request->title,
            $path,
            $request->place,
            $request->date,
            $request->description,
            auth()->id()
        );
        // redirect to the page of meetup
        return redirect()->route('view-event',['id'=> $request->id]);

    }
    // delete meet
    function deleteEvent( Request $request ){
        $event = new Event();
        $event->deleteEvent($request->id);
    }
    //search event
    function searchEvent( Request $request ){
        // delete meet
    }
}
