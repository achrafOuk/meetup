<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class AttemptEvent extends Model
{
    use HasFactory;
    public $table = 'attempt_events';
    //get the attemted events for the user
    // ->select('events.*',$this->table.'.*')
    public function get_attemted_event($user_id){
        return DB::table($this->table)
        ->join('events','events.id','=',$this->table.'.event_id')
        ->select('events.*')
        ->where('attempt_events.user_id',$user_id)->get();
    }
    //add  event to be attempted
    public function attempt_event($user_id,$event_id){
        echo gettype($user_id).'<br>';
        echo $event_id.'<br>';
        echo gettype($event_id).'<br>';
        DB::table($this->table)->insert([
            'user_id'=>$user_id,
            'event_id'=>$event_id,
        ]);
    } 
    //calel attempting event
    public function cancel_attempt_event($user_id,$event_id){
        DB::table($this->table)
        ->where('user_id',$user_id)
        ->where('event_id',$event_id)
        ->delete();
    }
}
