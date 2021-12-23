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
    public function get_attemted_event($user_id){
        return DB::table($this->table)->where('id',$user_id)->get();
    }
    //add  event to be attempted
    public function attempt_event($user_id,$event_id){
        DB::table($this->table)->insert([
            'user_id'->$user_id,
            'event_id'->$event_id,
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
