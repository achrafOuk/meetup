@extends('layouts/page')
@section('content')
<div class="content-section">
<h1 class="h4 text-gray-900 mb-4 justify-content-center">Edit student</h1>
<form method="POST" class="row g-3 align-items-center">
<fieldset class="form-group">
<legend class="border-bottom mb-4"></legend>
<p><label for="id_name">Name:</label> <input type="text" name="name" value="Ahmed Atef Hosni Mohamed" maxlength="300" required="" id="id_name" class="form-control"></p>
     <button class="btn btn-primary btn-user btn-block" type="submit">
        save
      </button>
    </div>
  </form>
</div>
@endsection