@extends('layouts.app', ['titlePage' => 'Index User'])

@section('content')
    <div class="text-end">
      <a href="{{ route('users.create') }}" class="btn btn-primary">
        <span class="material-icons">create</span> Add
      </a>
    </div>
    <table class="table">
      <thead>
        <tr>
          <th class="text-uppercase">No</th>
          <th class="text-center">Picture</th>
          <th class="text-center">firstName</th>
          <th class="text-center">lastName</th>
          <th class="text-center">fullName</th>
          <th class="text-center" colspan="3">Action</th>
        </tr>
      </thead>
      <tbody>
        @php $number = 1; @endphp


        @forelse ($users['data'] as $user)
          <tr class="align-middle">
            <td>{{ $number++ }}</td>
            <td class="text-center">
              @isset($user['picture'])
                <img src="{{ $user['picture'] }}" style="width: 100px; height: 100px" alt="Picture">
              @else
                <img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png" style="width: 100px; height: 100px" alt="Picture">
              @endisset
            </td>
            <td>{{ $user['firstName'] }}</td>
            <td>{{ $user['lastName'] }}</td>
            <td>{{ $user['firstName'] }} {{ $user['lastName'] }}</td>
            <td class="text-center">
              <a class="btn btn-info" href="{{ route('users.show', $user['id']) }}">
                <span class="material-icons">visibility</span> Show
              </a>
            </td>
            <td class="text-center">
              <a class="btn btn-warning" href="{{ route('users.edit', $user['id']) }}">
                <span class="material-icons">edit</span> Edit
              </a>
            </td>
            <td class="text-center">
              <form action="{{ route('users.destroy', $user['id']) }}" method="post">
                @method('delete')
                @csrf

                <button class="btn btn-danger" type="submit" onclick="return confirm('Are you sure to delete this user?')">
                  <span class="material-icons">delete</span> Delete
                </button>
              </form>
            </td>
          </tr>
        @empty
            <td colspan="7" class="text-center">No Records Found!</td>
        @endforelse
      </tbody>
    </table>
@endsection