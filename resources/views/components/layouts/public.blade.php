<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta
    name="viewport"
    content="width=device-width, initial-scale=1.0"
  >
  <title>KBRTEC PETS</title>

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
    rel="preconnect"
    href="https://fonts.googleapis.com"
  >
  <link
    rel="preconnect"
    href="https://fonts.gstatic.com"
    crossorigin
  >
  <link
    href="https://fonts.googleapis.com/css2?family=Bowlby+One&family=Montserrat:wght@500&display=swap"
    rel="stylesheet"
  >
  <link
    href="{{ asset('css/public.css') }}"
    rel="stylesheet"
  >
</head>

<body>
  <header class="border-bottom-1 shadow py-3">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-4">
          <a
            href="{{ route('index') }}"
            title="KBR TEC"
            class="d-inline-block"
          >
            <h1>
              <img
                src="{{ asset("img/logo.webp") }}"
                alt="KBR TEC"
                width="150"
              >
            </h1>
          </a>
        </div>

        <div class="col-8">
          <nav class="d-flex gap-4 align-items-center justify-content-end">
            <a href="{{ route('index') }}">Home</a>
            <a href="{{ route('animal.index') }}">Quero Adotar</a>
            <a
              href="{{ route('panel.login.index') }}"
              class="btn btn-custom"
            >Admin</a>
          </nav>
        </div>
      </div>
    </div>
  </header>
  @yield('content')
  <footer class="py-4">
    <div class="container">
      <div class="d-flex justify-content-between align-items-center">
        <p class="m-0">
          Copyright © 2023. Todos os direitos reservados
        </p>

        <a
          href="https://www.kbrtec.com.br/"
          target="_blank"
          title="Acesse o site da KBR TEC"
        >
          <img
            src="{{ asset("img/kbrtec.webp") }}"
            alt="KBRTEC"
            width="100"
          >
        </a>
      </div>
    </div>
  </footer>

  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    crossorigin="anonymous"
  ></script>
</body>

</html>
