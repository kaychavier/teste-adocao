@extends('components.layouts.public')
@section('content')
  <nav
    aria-label="breadcrumb"
    class="p-3 bg-custom-light"
  >
    <div class="container">
      <ol class="breadcrumb m-0">
        <li class="breadcrumb-item fs-sm"><a>Home</a></li>
        <li class="breadcrumb-item fs-sm"><a>Quero Adotar</a></li>
        <li class="breadcrumb-item fs-sm"><a>{{ $animal->name }}</a></li>
        <li
          class="breadcrumb-item active fs-sm"
          aria-current="page"
        >Formulário de Solicitação</li>
      </ol>
    </div>
  </nav>

  <section class="bg-light py-5">
    <div class="container mb-5">
      <h2 class="m-0 bowlby-one text-uppercase h5 text-center">Solicitação de adoção</h2>

      <p class="text-center">Preencha aqui os dados da pessoa interessada em adotar o animal selecionado:</p>

      <form
        action="{{ route('adoption.store', $animal) }}"
        method="POST"
        class="bg-custom rounded p-4 mt-4 col-6 mx-auto row"
      >
      @if (session()->has('success'))
      <div class="alert alert-success">{{ session()->get('success') }}</div>
    @endif
        @csrf
        <div class="form-group py-2 col-12">
          <label
            for="solicitante"
            class="text-capitalize text-light"
          >Seu nome:</label>
          <input
            type="text"
            class="form-control"
            name="name"
            id="solicitante"
          >
          @error('name')
            <strong class="invalid-feedback d-block">{{ $message }}</strong>
          @enderror
        </div>

        <div class="form-group py-2 col-12">
          <label
            for="animal"
            class="text-capitalize text-light"
          >Nome <span class="text-lowercase">do</span> animal:</label>
          <input
            type="text"
            class="form-control"
            id="animal"
            value="{{ $animal->name }}"
            disabled
          >
        </div>

        <div class="form-group py-2 col-6">
          <label
            for="cpf"
            class="text-capitalize text-light"
          >CPF:</label>
          <input
            type="text"
            class="form-control"
            name="document"
            id="cpf"
          >
          @error('document')
            <strong class="invalid-feedback d-block">{{ $message }}</strong>
          @enderror
        </div>

        <div class="form-group py-2 col-6">
          <label
            for="email"
            class="text-capitalize text-light"
          >E-mail:</label>
          <input
            type="email"
            class="form-control"
            name="email"
            id="email"
          >
          @error('email')
            <strong class="invalid-feedback d-block">{{ $message }}</strong>
          @enderror
        </div>

        <div class="form-group py-2 col-6">
          <label
            for="cel"
            class="text-capitalize text-light"
          >Celular:</label>
          <input
            type="text"
            class="form-control"
            name="phone"
            id="cel"
          >
          @error('phone')
            <strong class="invalid-feedback d-block">{{ $message }}</strong>
          @enderror
        </div>

        <div class="form-group py-2 col-6">
          <label
            for="nascimento"
            class="text-capitalize text-light"
          >Data <span class="text-lowercase">de</span> Nascimento:</label>
          <input
            type="date"
            class="form-control"
            name="birth_date"
            id="nascimento"
          >
          @error('birth_date')
            <strong class="invalid-feedback d-block">{{ $message }}</strong>
          @enderror
        </div>

        <div class="form-group mb-3">
           {!! NoCaptcha::renderJs() !!}
           {!! NoCaptcha::display() !!}
        </div>

        <div class="col-12 d-flex justify-content-center mt-4">
          <button class="btn btn-custom-2">Solicitar</button>
        </div>
      </form>
    </div>
  </section>

  <section
    class="bg-custom py-3"
    style="background-color: #FFECCE;"
  >
    <div class="container">
      <div class="d-flex align-items-center justify-content-center gap-3">
        <div class="d-flex flex-column align-items-end">
          <h2 class="bowlby-one text-uppercase h4 m-0">Alguma dúvida?</h2>

          <a class="btn btn-custom">Entre em contato</a>
        </div>
        <img
          src="{{ asset('img/cartoon-cat-3.webp') }}"
          alt="Gato"
          width="150"
        >
      </div>
    </div>
  </section>
  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script>
    $('#cpf').mask('###.###.###-##');
    $('#cel').mask('(##) #####-####');
  </script>
@endsection
