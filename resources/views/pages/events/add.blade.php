@extends('layouts/page')
@section('content')
<div class="d-flex justify-content-center">
<h1 class="h4 text-gray-900 mb-4 justify-content-center">Add new event</h1>
<form action="{{route('Add-event')}}" method="POST" enctype="multipart/form-data"
class="row g-3 align-items-center">
  @csrf
<legend  class="border-bottom mb-4"></legend>
<p><label for="id_name">Name:</label> <input 
          type="text" 
          name="title" 
          maxlength="300" 
          required="" 
          value = "Laravel meetup"
          id="id_name" 
          class="form-control"></p>
<p><label for="id_name">Image:</label> 
<input 
    type="file" 
    name="image" 
    maxlength="300" 
    required="" 
    value = "Laravel meetup"
    id="id_name" 
    accept="image/png, image/jpeg"
    class="form-control"></p>

<p><label for="id_name">Place:</label> <input 
          type="text" 
          name="place" 
          maxlength="300" 
          value = "C city"
          required="" 
          class="form-control"></p>
<p><label for="id_name">Date:</label> <input 
          type="text" 
          name="date" 
          maxlength="300" 
          value = "2022-01-22"
          required="" 
          class="form-control"></p>

<p><label for="id_name">Description:</label> <textarea 
          type="text" 
          name="description" 
          maxlength="300" 
          required="" 
          value = "Laravel meet up at C city."
          class="form-control"></textarea></p>

<button class="btn btn-primary btn-user btn-block" type="submit">
        save
</button>
    </div>
  </form>
</div>
@endsection