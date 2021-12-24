@extends('layouts/page')
@section('content')
@if( $events->count()>0)
    <div class="row">
    <p class="row justify-content-left"> List of events </p>
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
No event to be shown
@endif
@endsection