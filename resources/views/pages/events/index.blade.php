@extends('layouts/page')
@section('content')
@if( $events->count()>0)
    @foreach($events as $event)
    <div class="card w-100" style="width: 18rem;">
        <div class="card-body">
            @if(!isset($view))
            <img src="{{route('get-image',['filename'=>$event->image])}}" alt="" title="">
            <a class="card-title" href="{{route('view-event',['id'=>$event->id])}}">{{$event->title}}</a>
            <p class="card-text">Place:{{$event->place}}</p>
            <a href="#" class="btn btn-primary">Interessted</a>
            @else
            <img src="{{route('get-image',['filename'=>$event->image])}}" alt="" title="">
            <h3 class="card-title" href="{{route('view-event',['id'=>$event->id])}}">{{$event->title}}</h3>
            <p class="card-text">Place:{{$event->place}}</p>
            <p class="card-text">{{$event->discription}}</p>
            @endif
        </div>
    </div>
    @endforeach
@else
No event to be shown
@endif
@endsection