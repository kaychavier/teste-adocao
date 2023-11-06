@extends('components.layouts.panel')
@section('content')
  <main class="col h-100 text-light p-4">
    <div class="d-flex align-items-end justify-content-between mb-4">
      <h1 class="h3">Editar perfil</h1>
    </div>

    <form
      action="{{ route('panel.profile.update') }}"
      class="bg-custom rounded col-12 py-3 px-4"
      method="POST"
    >
      @csrf
      @if (session()->has('success'))
        <div class="alert alert-success">{{ session()->get('success') }}</div>
      @endif
      @method('PUT')
      <div class="mb-3 row">
        <label
          for="usuario"
          class="col-sm-2 col-form-label"
        >Usuário:</label>
        <div class="col-sm-10">
          <input
            type="text"
            class="form-control bg-dark text-light border-dark"
            id="usuario"
            name="name"
            value="{{ old('name') ?? $user->name }}"
            placeholder="Ex: Admin"
          >
          @error('name')
            <strong class="invalid-feedback d-block">{{ $message }}</strong>
          @enderror
        </div>
      </div>

      <div class="mb-3 row">
        <label
          for="email"
          class="col-sm-2 col-form-label"
        >E-mail:</label>
        <div class="col-sm-10">
          <input
            type="email"
            class="form-control bg-dark text-light border-dark"
            id="email"
            name="email"
            value="{{ old('email') ?? $user->email }}"
            placeholder="Ex: admin@kbrtec.com.br"
          >
          @error('email')
            <strong class="invalid-feedback d-block">{{ $message }}</strong>
          @enderror
        </div>
      </div>

      <div class="mb-3 row">
        <label
          for="senha"
          class="col-sm-2 col-form-label"
        >Senha:</label>
        <div class="col-sm-10">
          <input
            type="password"
            class="form-control bg-dark text-light border-dark"
            name="password"
            id="senha"
          >
          @error('password')
            <strong class="invalid-feedback d-block">{{ $message }}</strong>
          @enderror
        </div>
      </div>

      <div class="mb-3 row">
        <label
          for="confSenha"
          class="col-sm-2 col-form-label"
        >Confirmar Senha:</label>
        <div class="col-sm-10">
          <input
            type="password"
            class="form-control bg-dark text-light border-dark"
            id="confSenha"
            name="password_confirmation"
          >
        </div>
      </div>

      <div class="d-flex justify-content-end">
        <button
          type="submit"
          class="btn btn-light"
        >Salvar</button>
      </div>
    </form>

    <div class="bg-custom rounded overflow-hidden">

    </div>
  </main>
@endsection
