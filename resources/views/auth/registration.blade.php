@extends('layout')
@include('..dashboards.nav')
@section('content')
<main class="login-form">
  <div class="container">
      <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card">
                  <div class="card-header">Register</div>
                  <div class="card-body">
                      <form action="{{ route('register.post') }}" method="POST">
                          @csrf

                          <div class="form-group row">
                              <label for="username" class="col-md-4 col-form-label text-md-right">Username</label>
                              <div class="col-md-6">
                                  <input type="text" id="username" class="form-control" name="username" required autofocus>
                                  @if ($errors->has('username'))
                                      <span class="text-danger">{{ $errors->first('username') }}</span>
                                  @endif
                              </div>
                          </div>

                          <div class="form-group row">
                              <label for="firstname" class="col-md-4 col-form-label text-md-right">First Name</label>
                              <div class="col-md-6">
                                  <input type="text" id="firstname" class="form-control" name="firstname" required>
                                  @if ($errors->has('firstname'))
                                      <span class="text-danger">{{ $errors->first('firstname') }}</span>
                                  @endif
                              </div>
                          </div>

                          <div class="form-group row">
                              <label for="lastname" class="col-md-4 col-form-label text-md-right">Last Name</label>
                              <div class="col-md-6">
                                  <input type="text" id="lastname" class="form-control" name="lastname" required>
                                  @if ($errors->has('lastname'))
                                      <span class="text-danger">{{ $errors->first('lastname') }}</span>
                                  @endif
                              </div>
                          </div>

                          <div class="form-group row">
                              <label for="address" class="col-md-4 col-form-label text-md-right">Address</label>
                              <div class="col-md-6">
                                  <input type="text" id="address" class="form-control" name="address" required>
                                  @if ($errors->has('address'))
                                      <span class="text-danger">{{ $errors->first('address') }}</span>
                                  @endif
                              </div>
                          </div>

                          <div class="form-group row">
                              <label for="phone" class="col-md-4 col-form-label text-md-right">Phone</label>
                              <div class="col-md-6">
                                  <input type="text" id="phone" class="form-control" name="phone" required>
                                  @if ($errors->has('phone'))
                                      <span class="text-danger">{{ $errors->first('phone') }}</span>
                                  @endif
                              </div>
                          </div>

                          <div class="form-group row">
                              <label for="email_address" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                              <div class="col-md-6">
                                  <input type="text" id="email_address" class="form-control" name="email" required>
                                  @if ($errors->has('email'))
                                      <span class="text-danger">{{ $errors->first('email') }}</span>
                                  @endif
                              </div>
                          </div>

                          <div class="form-group row">
                              <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                              <div class="col-md-6">
                                  <input type="password" id="password" class="form-control" name="password" required>
                                  @if ($errors->has('password'))
                                      <span class="text-danger">{{ $errors->first('password') }}</span>
                                  @endif
                              </div>
                          </div>

                          <div class="form-group row">
                              <label for="password_confirmation" class="col-md-4 col-form-label text-md-right">Confirm Password</label>
                              <div class="col-md-6">
                                  <input type="password" id="password_confirmation" class="form-control" name="password_confirmation" required>
                              </div>
                          </div>

                          <div class="form-group row">
                              <div class="col-md-6 offset-md-4">
                                  <button type="submit" class="btn btn-primary">
                                      Register
                                  </button>
                              </div>
                          </div>
                      </form>
                  </div>
              </div>
          </div>
      </div>
  </div>
</main>
@endsection
