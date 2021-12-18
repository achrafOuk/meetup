<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
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
    //view event
    function veiwEvent($id){
        $events = new Event();
        $event = $events->showEvent($id);
        $view = true;
        $event1 = $event->first();
        if(count($event)){

        $path_image = explode("/", $event1->image);
        $event->first()->image = $path_image[count($path_image)-1];
            return view('pages.events.index',['events'=>$event,'view'=>$view]);
        }
        else{
            return view('pages.events.index');
        }
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
