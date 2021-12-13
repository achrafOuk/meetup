@extends('layouts/page')
@section('content')
<div class="card o-hidden border-0 shadow-lg my-5" style="
">
            <div class="card-body p-0">
              <!-- Nested Row within Card Body -->
              <div class="row">
                <div class="col-lg-12">
                  <div class="p-5">
                <form action="{{route('Login')}}" method="POST" class="col-lg-12 user">
                  @csrf
                      <input type="hidden" name="csrfmiddlewaretoken" value="NzlicSo243hORE1qinitkJVOY3muVLZOtHNvsyAxBPwBLLWRiQ9mLzhFvgfbSyUe" class="form-control form-control-user">
                      <fieldset class="form-group">
                        <legend class="border-bottom mb-4">Log In</legend>
                      <div id="div_id_username" class="control-group"> <label for="id_username" class="control-label requiredField">
                      Username<span class="asteriskField">*</span> </label> <div class="controls"> <input type="text" name="username"  autocapitalize="none"  maxlength="150" class="form-control form-control-user" required="" id="id_username"> </div> </div> <div id="div_id_password" class="control-group"> <label for="id_password" class="control-label requiredField">
                      Password<span class="asteriskField">*</span> </label> <div class="controls"> <input type="password" name="password" autocomplete="current-password" class="form-control form-control-user" required="" id="id_password"> </div> </div>
                      </fieldset>
                      <a href="{{route('signup')}}">If you don't have account, siginup!</a>
                      <div class="form-group">
                        <button class="btn btn-primary btn-user btn-block" type="submit">
                          Login
                        </button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
@endsection