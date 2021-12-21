@extends('layouts/page')
@section('content')
<div class="d-flex justify-content-center">
<h1 class="h4 text-gray-900 mb-4 justify-content-center">Edit meet</h1>
<form action="{{ route('Edit-event',['id'=>$event->id] ) }}" method="POST" enctype="multipart/form-data"
class="row g-3 align-items-center">
@csrf
<legend class="border-bottom mb-4"></legend>
<p><label for="id_name">Name:</label> <input 
          type="text" 
          name="title" 
          maxlength="300" 
          required="" 
          value = "{{ $event->title }}"
          id="id_name" 
          class="form-control"></p>

<p><label for="id_name">Image:</label> <br>
<img 
class="img-fluid"
src="{{route('get-image',['filename'=>$event->image])}}" 
alt="" 
title=""><br>
<button type="button" class="btn btn-success">Edit image</button>
  <input 
      type="file" 
      name="image" 
      maxlength="300" 
      value = "{{ $event->image }}"
      onChange='PreviewImage();'
      id="id_name" 
      accept="image/png, image/jpeg"
      class="form-control"></p>

<p><label for="id_name">Place:</label> <input 
          type="text" 
          name="place" 
          maxlength="300" 
          value = "{{ $event->place }}"
          required="" 
          class="form-control"></p>
<p><label for="id_name">Date:</label> <input 
          type="datetime-local" 
          name="date" 
          maxlength="300" 
          value = "{{ $event->date }}"
          required="" 
          id="myLocalDate"
          class="form-control"></p>
<p><label for="id_name">Description:</label> <textarea 
          type="text" 
          name="description" 
          maxlength="300" 
          required="" 
          class="form-control">{{ $event->discription }}
        </textarea></p>

<button class="btn btn-primary btn-user btn-block" type="submit">
        save
</button>
    </div>
  </form>
</div>
@endsection

@section('script')
<script>
// show the default value of date
let defaultDate = document.getElementById("myLocalDate").defaultValue; 
defaultDate = defaultDate.replace(" ", "T");
document.getElementById("myLocalDate").value = defaultDate;
//upload the image 
document.querySelector('button.btn.btn-success')
.addEventListener('click',()=>{ 
  document.querySelector('input[type="file"]').click();
  });
// show preview of the image uploaded
function PreviewImage() {
        var oFReader = new FileReader();
        //get the image uploaded by the user
        oFReader.readAsDataURL(document.querySelector("input[type='file']").files[0]);
        //show image's preview
        oFReader.onload = function (oFREvent) {
            document.querySelector(".img-fluid").src = oFREvent.target.result;
        };
};
</script>
@endsection