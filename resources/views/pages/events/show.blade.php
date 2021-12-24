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
        @if( $attempt or !auth()->id())
        <form action="{{route('attempt_event',['id'=>$event->id])}}" method='POST'>
            @csrf
                <button style=" width: 100%;" type='submit' class="btn btn-primary">Interessted</buttin>
        </form>
        @else 
            <form action="{{route('cancel_attempt_event',['id'=>$event->id])}}" method='POST'>
                @csrf
                <button style=" width: 100%;" type='submit' class="btn btn-primary">Not interessted</buttin>
            </form>
        @endif
    @else
        <a href="{{route('edit-event',['id'=>$event->id])}}" class="btn btn-primary">Edit</a>
    @endif
    </div>
</div>
@endsection
