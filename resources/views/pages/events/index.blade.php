@extends('layouts/page')
@section('content')
@if( $events->count()>0)
    @if(!isset($view))
        <div class="row">
        @foreach($events as $event)
        <div class="card w-25" style="width: 18rem;">
            <div class="card-body">
                <img class="card-img-top" src="{{route('get-image',['filename'=>$event->image])}}" alt="" title="">
                <a class="card-title" href="{{route('view-event',['id'=>$event->id])}}">{{$event->title}}</a>
            </div>
        </div>
        @endforeach
</div>
        @else
            @foreach($events as $event)
            <div class="card w-75" style="width: 18rem;">
                <div class="card-body">
                <img src="{{route('get-image',['filename'=>$event->image])}}" alt="" title="">
                <h3 class="card-title" href="{{route('view-event',['id'=>$event->id])}}">{{$event->title}}</h3>
                <p class="card-text">Place:{{$event->place}}</p>
                <p class="card-text">Time:{{$event->date}}</p>
                <p class="card-text">{{$event->discription}}</p>
                <a href="#" class="btn btn-primary">Interessted</a>
                </div>
            </div>
            @endforeach
    @endif
@else
No event to be shown
@endif
@endsection