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
            action="{{ route('panel.password-reset.store') }}"
            method="POST"
            class="form w-100"
          >
            @csrf
            <h2 class="h4 text-light">Esqueceu sua senha?</h2>
            <p class="mb-4 text-light fw-light">Apenas digite seu e-mail abaixo e enviaremos um link para ele para
              redefinir sua senha!</p>
            @if (session()->has('success'))
              <div class="alert alert-success">{{ session()->get('success') }}</div>
            @endif

            <div class="row row-gap-3">
              <div class="col-12 form-group text-light">
                <label for="email">E-mail:</label>
                <input
                  type="email"
                  class="form-control bg-dark border-dark text-light"
                  id="email"
                  name="email"
                  placeholder="example@kbrtec.com.br"
                >
              </div>
              @error('email')
                <strong class="invalid-feedback d-block">{{ $message }}</strong>
              @enderror

              <div class="col-12 mt-3 d-flex gap-2 align-items-center justify-content-between">
                <button
                  type="submit"
                  class="btn btn-light"
                >Resetar senha</button>

                <a
                  href="{{ route('panel.login.index') }}"
                  class="link-light"
                >Voltar</a>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </main>
@endsection
