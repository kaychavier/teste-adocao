<!DOCTYPE html>
<html
  lang="pt-br"
  class="h-100"
>

<head>
  <meta charset="UTF-8">
  <meta
    name="viewport"
    content="width=device-width, initial-scale=1.0"
  >
  <title>KBRTEC ADMIN</title>

  <link
    rel="icon"
    type="image/x-icon"
    href="img/favicon.ico"
  >
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
    rel="stylesheet"
    crossorigin="anonymous"
  >
  <link
    href="{{ asset('css/style.css') }}"
    rel="stylesheet"
  >
</head>

<body class="bg-dark h-100">
  @auth
    @include('components.navigation.header')
    <div
      class="d-flex"
      style="min-height: calc(100vh - 76px - 72px);"
    >
      @include('components.navigation.sidebar')
      @yield('content')
    </div>
  @else
    @yield('content')
  @endauth
  <footer class="bg-custom text-light text-center py-4">
    <small>© Copyright 2023 - KBR TEC - Todos os Direitos Reservados</small>
  </footer>

  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    crossorigin="anonymous"
  ></script>
</body>

</html>
