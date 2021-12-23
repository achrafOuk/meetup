@extends('layouts/page')
@section('content')
<div class="card w-75" style="width: 18rem;">
    <div class="card-body">
    <!---img src="{{route('get-image',['filename'=>$event->image])}}" alt="" title=""--->
    <img src="{{route('get-image',['filename'=>$event->image])}}" alt="" title="">
    <h3 class="card-title" href="{{route('view-event',['id'=>$event->id])}}">{{$event->title}}</h3>
    <p class="card-text">Place:{{$event->place}}</p>
    <p class="card-text">Time:{{$event->date}}</p>
    <p class="card-text">{{$event->discription}}</p>
    @if(!isset($edit))
        <a href="{{route('attempt_event',['id'=>$event->id])}}" class="btn btn-primary">Interessted</a>
    @else
        <a href="{{route('edit-event',['id'=>$event->id])}}" 
        class="btn btn-primary">Edit</a>
    @endif
    </div>
</div>
@endsection
