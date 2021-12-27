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
        $events =DB::table($this->table)
        ->orderBy('date','asc')->paginate(2);
        return $events;
    }
    public function showEvent($id){
        return DB::table($this->table)->where('id',$id)->get();
    }
    public function getMyEvents(){
        $user_id = auth()->id();
        $events =DB::table($this->table)->where('user_id',$user_id)
        ->orderBy('date','asc')->paginate(2);
        return $events;
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
    public function editEvent($id,$title,$img,$place,$date,$desc,$user_id){
        $date = str_replace('T',' ',$date);
        DB::table($this->table)->where('id',$id)->update([
            'title'=>$title,
            'image'=>$img,
            'place'=>$place,
            'date'=>$date,
            'discription'=>$desc,
            'user_id'=>$user_id
        ]);
    }
    public function deleteEvent($id){
        DB::table($this->table)->where('id',$id)->delete();
    }
    public function searchEvent($search){
        return DB::table($this->table)
        ->where('title','like',"%{$search}%")->paginate(5);
    }
}
