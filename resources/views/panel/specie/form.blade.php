@extends('components.layouts.panel')
@section('content')
  <main class="col h-100 text-light p-4">
    <div class="d-flex align-items-end justify-content-between mb-4">
      <h1 class="h3">{{ $specie->id ? 'Editar' : 'Cadastrar' }} Espécie</h1>

      <a
        href="{{ route('panel.specie.index') }}"
        class="btn btn-light"
      >Voltar</a>
    </div>

    <form
      action="{{ $specie->id ? route('panel.specie.update', $specie) : route('panel.specie.store') }}"
      class="bg-custom rounded col-12 py-3 px-4"
      method="POST"
    >
      @csrf
      @if ($specie->id)
        @method('PUT')
      @endif
      <div class="mb-3 row">
        <label
          for="especie"
          class="col-sm-2 col-form-label"
        >Espécie:</label>
        <div class="col-sm-10">
          <input
            type="text"
            class="form-control bg-dark text-light border-dark"
            id="especie"
            name="name"
            value="{{ old('name') ?? $specie->name }}"
            placeholder="Ex: Cachorro"
          >
          @error('name')
            <strong class="invalid-feedback d-block">{{ $message }}</strong>
          @enderror
        </div>
      </div>

      <button
        type="button"
        class="btn btn-light d-block mx-auto  mb-3"
        id="specie-btn"
      >Adicionar Raça</button>

      <div
        class="mb-3 row"
        id="species-row"
      >
        @foreach ($specie->breeds as $index => $breed)
          <div class="col-12 row">
            <label class="col-sm-2 col-form-label mb-3">Raça:</label>
            <div class="col-sm-9 mb-3">

              <input
                type="hidden"
                name="breeds[{{ $index }}][id]"
                value="{{ $breed->id }}"
              >
              <input
                type="text"
                class="form-control bg-dark text-light border-dark"
                name="breeds[{{ $index }}][name]"
                placeholder="Ex: Husky"
                value="{{ $breed->name }}"
                required
              >
            </div>
            <div class="col-sm-1 mb-3">
              <span
                class="btn btn-danger"
                onclick="removeSpecie(this)"
              >
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  width="16"
                  height="16"
                  fill="currentColor"
                  class="bi bi-trash"
                  viewBox="0 0 16 16"
                >
                  <path
                    fill="#FFF"
                    d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"
                  />
                  <path
                    fill="#FFF"
                    d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"
                  />
                </svg>
              </span>
            </div>
          </div>
        @endforeach
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
  <script>
    const speciesRow = document.getElementById('species-row');
    const speciesBtn = document.querySelector('button#specie-btn');

    function removeSpecie(element) {
      element.parentNode.parentNode.remove()
    }

    speciesBtn.addEventListener('click', () => {
      speciesRow.innerHTML += ` <div class="col-12 row">
               <label
          class="col-sm-2 col-form-label mb-3"
        >Raça:</label>
        <div class="col-sm-9 mb-3">
          <input
            type="text"
            class="form-control bg-dark text-light border-dark"
            name="breeds[][name]"
            placeholder="Ex: Husky"
            value=""
            required
          >
        </div>
        <div class="col-sm-1 mb-3">
          <span class="btn btn-danger" onclick="removeSpecie(this)">
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="16"
                        height="16"
                        fill="currentColor"
                        class="bi bi-trash"
                        viewBox="0 0 16 16"
                      >
                        <path
                          fill="#FFF"
                          d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"
                        />
                        <path
                          fill="#FFF"
                          d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"
                        />
                      </svg>
                    </span>
        </div>
        </div>`
    })
  </script>
@endsection
