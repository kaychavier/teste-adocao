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
            action="{{ route('panel.password-reset.update', $token) }}"
            method="POST"
            class="form w-100"
          >
            @method('PUT')
            @csrf
            <h2 class="h4 text-light">Digite sua nova senha</h2>

            <div class="row row-gap-3">
              <div class="col-12 form-group text-light mb-3">
                <label for="password">Nova Senha:</label>
                <input
                  type="password"
                  class="form-control bg-dark border-dark text-light"
                  id="password"
                  name="password"
                >
                @error('password')
                  <strong class="invalid-feedback d-block">{{ $message }}</strong>
                @enderror
              </div>

              <div class="col-12 form-group text-light">
                <label for="password_confirmation">Confirmar Nova Senha:</label>
                <input
                  type="password"
                  class="form-control bg-dark border-dark text-light"
                  id="password_confirmation"
                  name="password_confirmation"
                >
              </div>

              <div class="col-12 mt-3 d-flex gap-2 align-items-center justify-content-between">
                <button
                  type="submit"
                  class="btn btn-light"
                >Resetar senha</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </main>
@endsection
