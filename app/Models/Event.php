<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Event extends Model
{
    use HasFactory;
    public $table = 'events';
    public function getEvents(){
        $events =DB::table($this->table)->get();
        return $events;
    }
    public function showEvent($id){
        return DB::table($this->table)->where('id',$id)->get();
    }
    //insert the new event
    public function addEvent($title,$img,$place,$date,$desc,$user_id){
        DB::table($this->table)->insert([
            'title'=>$title,
            'image'=>$img,
            'place'=>$place,
            'date'=>$date,
            'discription'=>$desc,
            'user_id'=>$user_id
        ]);
    }
    public function editEvent(){
    }
    public function deleteEvent(){
    }
    public function searchEvent(){

    }
}
