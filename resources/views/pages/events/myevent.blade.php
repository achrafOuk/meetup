@extends('layouts/page')
@section('content')
<div class="row justify-content-center" style="
    flex-direction: column;
">
    <p class="row justify-content-left" style=" margin-bottom: 2%;"> Events you organized </p>
    <button type="button" class="btn btn-primary" style=" width: 10%; ">
        <a href="{{route('add-event')}}" style='color: white !important;'>
            Add new meet
        </a>
    </button>
    @if( $events->count()>0)
            <div class="d-flex p-2">
                @foreach($events as $event)
                <div class="card w-25" style="width: 18rem;">
                    <div class="card-body">
                        <img src="{{route('get-image',['filename'=>$event->image])}}" alt="" title="">
                        <a class="card-title" href="{{route('view-event',['id'=>$event->id])}}">{{$event->title}}</a>
                        <div class="actions d-flex justify-content-center">
                        <button href="{{route('edit-event',['id'=>$event->id] )}}" type="button" class="btn btn-success">edit</button>
                        <button href="{{route('edit-event',['id'=>$event->id] )}}"  type="button" class="btn btn-danger">Delete</button>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
    @include("layouts/pagination")
    @else
    <p class="row justify-content-center"> No don't have any event to be shown </p>
    @endif
</div>
@endsection