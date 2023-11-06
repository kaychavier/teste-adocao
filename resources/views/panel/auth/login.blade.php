@extends('components.layouts.panel')
@section('content')
  <main
    class="py-5"
    style="min-height: calc(100vh - 72px);"
  >
    <div class="container">
      <div class="bg-custom mx-auto row col-8 rounded shadow-sm overflow-hidden">
        <div class="col-6 bg-white p-5 d-flex align-items-center justify-content-center">
          <img
            src="{{ asset('img/kbrtec.webp') }}"
            alt="KBRTEC"
            height="200"
            width="200"
            class="object-fit-contain"
          >
        </div>

        <div class="col-6 d-flex align-items-center p-5">
          <form
            action="{{ route('panel.login.store') }}"
            class="form w-100"
            method="post"
          >
            @csrf
            <h2 class="h4 text-light mb-4">Painel Administrativo</h2>
            @if (session()->has('success'))
              <div class="alert alert-success">{{ session()->get('success') }}</div>
            @endif

            <div class="row row-gap-3">
              <div class="col-12 form-group text-light">
                <label for="email">E-mail:</label>
                <input
                  type="email"
                  class="form-control border-dark"
                  id="email"
                  placeholder="example@kbrtec.com.br"
                  name="email"
                >
                @error('email')
                  <strong class="invalid-feedback d-block">{{ $message }}</strong>
                @enderror
              </div>

              <div class="col-12 form-group text-light">
                <label for="password">Senha:</label>
                <input
                  type="password"
                  class="form-control border-dark"
                  id="password"
                  name="password"
                >
                @error('password')
                  <strong class="invalid-feedback d-block">{{ $message }}</strong>
                @enderror
              </div>

              <div class="col-12 form-group text-light">
                <div class="form-check">
                  <input
                    class="form-check-input"
                    type="checkbox"
                    value=""
                    id="flexCheckDefault"
                    name="remember"
                  >
                  <label
                    class="form-check-label"
                    for="flexCheckDefault"
                  >
                    Lembrar de mim
                  </label>
                </div>
              </div>

              <div class="col-12">
                <button
                  type="submit"
                  class="btn btn-light mt-3"
                >Entrar</button>
              </div>
              <a
                href="{{ route('panel.password-reset.index') }}"
                class="link-light"
              ><small>Esqueci minha senha</small></a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </main>
@endsection
