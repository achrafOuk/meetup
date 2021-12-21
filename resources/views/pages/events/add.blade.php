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

<p><label for="id_name">Image:</label> <br>
<img 
class="img-fluid"
src = 'data:image/png;base64,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'
alt="" 
title=""><br>
<button type="button" class="btn btn-success">Add image</button>
  <input 
      type="file" 
      name="image" 
      maxlength="300" 
      onChange='PreviewImage();'
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
          type="datetime-local" 
          name="date" 
          maxlength="300" 
          required="" 
          id="myLocalDate"
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
@section('script')
<script>
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