@extends('layouts/page')
@section('content')
<div class="row justify-content-center">
    <a href="{{route('add-event')}}"><button type="button" class="btn btn-primary">Add new meet</button></a>
    @if( $events->count()>0)
            <div class="d-flex p-2">
                @foreach($events as $event)
                <div class="card w-25" style="width: 18rem;">
                    <div class="card-body">
                        <img src="{{route('get-image',['filename'=>$event->image])}}" alt="" title="">
                        <a class="card-title" href="{{route('view-event',['id'=>$event->id])}}">{{$event->title}}</a>
                        <div class="actions d-flex justify-content-center">
                        <a href="{{route('edit-event',['id'=>$event->id] )}}">
                            <button type="button" class="btn btn-success">Edit</button>
                        </a>
                        <a href="{{route('add-event')}}">
                            <button type="button" class="btn btn-danger">Delete</button>
                        </a>

                        </div>
                    </div>
                </div>
                @endforeach
            </div>
    @else
    No event to be shown
    @endif
</div>
@endsection