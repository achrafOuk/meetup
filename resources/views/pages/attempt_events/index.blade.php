@extends('layouts/page')
@section('content')
@if( $events->count()>0)
<div class="row">
    <p class="row justify-content-left"> Events you will attempt </p>
        @foreach($events as $event)
        <div class="card w-25" style="width: 18rem;">
            <div class="card-body">
                <img class="card-img-top" src="{{route('get-image',['filename'=>$event->image])}}" alt="" title="">
                <a class="card-title" href="{{route('view-event',['id'=>$event->id])}}">{{$event->title}}</a>
            </div>
        </div>
        @endforeach
    </div>

    @include("layouts/pagination")
@else
    <div class="row d-flex justify-content-center" style='text-align: center;'>
        You don't have events to attempts yet
    </div>
@endif
@endsection