<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Consume Rest API | {{ $titlePage }}</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
  <nav class="navbar navbar-light" style="box-shadow: 0 2px 4px 0 rgba(0,0,0,.2);">
    <div class="container">
      <span class="navbar-brand mb-0 h1" style="font-size: 2em">Consume API</span>
    </div>
  </nav>
  <div class="container" style="margin-top: 50px">
    @yield('content')
  </div>

  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script>
    @if (Session::has('success'))
      var msg = "{{ session('success') }}";
      Swal.fire({
          icon: 'success',
          title: 'Success!',
          text: msg,
          timer: 3000,
          showConfirmButton: false,
      })
    @endif
    @if (Session::has('error'))
      var msg = "{!! session('error') !!}"
      Swal.fire({
          icon: 'error',
          title: 'Error!',
          html: msg,
          timer: 10000,
          showConfirmButton: false,
      })
    @endif
  </script>
</body>
</html>