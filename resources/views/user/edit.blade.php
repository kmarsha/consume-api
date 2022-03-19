@extends('layouts.app', ['titlePage' => 'Edit User'])

@section('content')
    <div class="text-center">
      <h1>Create new User</h1>
    </div>

    @if(Session::has('error'))
      <div class="alert alert-danger">{!! session('error') !!}</div>
    @endif

    <form action="{{ route('users.update', $user['id']) }}" method="post">
      @method('put')
      @csrf

      <div class="row mt-4">
        <div class="col-6">
          <label for="inputFirstName" class="form-label">First Name</label>
          <input type="text" class="form-control" value="{{ $user['firstName'] }}" name="firstName" id="inputFirstName">
        </div>
        <div class="col-6">
          <label for="inputLastName" class="form-label">Last Name</label>
          <input type="text" value="{{ $user['lastName'] }}" name="lastName" id="inputLastName" class="form-control">
        </div>
      </div>
      <div class="my-4">
        <label for="inputPicture" class="form-label">Picture</label>
        <input type="text" value="{{ old('text') }}" class="form-control" name="picture" id="inputPicture">
      </div>
      <div class="text-end my-4">
        <button class="btn btn-success" type="submit">Updated</button>
      </div>
    </form>
@endsection