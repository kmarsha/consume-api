@extends('layouts.app', ['titlePage' => 'Show User'])

@section('content')
  <div class="text-start">
    <a href="{{ route('users.index') }}" class="btn btn-dark"><span class="material-icons">arrow_back</span> Back</a>
  </div>
    <div class="text-center">
      <h3>Detail User</h3>
      @isset($user['picture'])
        <img src="{{ $user['picture'] }}" style="width: 150px; height: 150px" alt="Picture">
      @else
        <img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png" style="width: 150px; height: 150px" alt="Picture">
      @endisset
      <div class="my-2">
        <h6>First Name: </h6> {{ $user['firstName'] }}
      </div>
      <div class="my-2">
        <h6>Last Name: </h6> {{ $user['lastName'] }}
      </div>
      <div class="my-2">
        <h6>Email: </h6> {{ $user['email'] }}
      </div>
    </div>
@endsection