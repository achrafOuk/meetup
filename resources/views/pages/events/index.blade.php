@extends('layouts/page')
@section('content')
List of the Events 
@if( $events->count()>0)
    @foreach($events as $event)
    <div class="card w-100" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">{{$event->title}}</h5>
            <p class="card-text">Place:{{$event->place}}</p>
            <p class="card-text">{{$event->discription}}</p>
            <a href="#" class="btn btn-primary">Read more</a>
        </div>
    </div>
    @endforeach

@else
No event to be shown
@endif
@endsection