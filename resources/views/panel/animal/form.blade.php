@extends('components.layouts.panel')
@section('content')
  <main class="col h-100 text-light p-4">
    <div class="d-flex align-items-end justify-content-between mb-4">
      <h1 class="h3">{{ $animal->id ? 'Editar' : 'Cadastrar' }} Animal</h1>

      <a
        href="{{ route('panel.animal.index') }}"
        class="btn btn-light"
      >Voltar</a>
    </div>

    <form
      action="{{ $animal->id ? route('panel.animal.update', $animal) : route('panel.animal.store') }}"
      class="bg-custom rounded col-12 py-3 px-4"
      method="POST"
      enctype="multipart/form-data"
    >
      @csrf
      @if ($animal->id)
        @method('PUT')
      @endif
      <div class="mb-3 row">
        <label
          for="animal"
          class="col-sm-2 col-form-label"
        >Animal:</label>
        <div class="col-sm-10">
          <input
            type="text"
            class="form-control bg-dark text-light border-dark"
            id="animal"
            name="name"
            value="{{ old('name') ?? $animal->name }}"
            placeholder="Ex: Cachorro"
          >
          @error('name')
            <strong class="invalid-feedback d-block">{{ $message }}</strong>
          @enderror
        </div>
      </div>

      <div class="mb-3 row">
        <label
          for="age"
          class="col-sm-2 col-form-label"
        >Idade:</label>
        <div class="col-sm-10">
          <input
            type="text"
            class="form-control bg-dark text-light border-dark"
            id="age"
            name="age"
            value="{{ old('age') ?? $animal->age }}"
            placeholder="Ex: 4 meses"
          >
          @error('age')
            <strong class="invalid-feedback d-block">{{ $message }}</strong>
          @enderror
        </div>
      </div>

      <div class="mb-3 row">
        <label
          for="weight"
          class="col-sm-2 col-form-label"
        >Peso:</label>
        <div class="col-sm-10">
          <input
            type="number"
            step="0.01"
            class="form-control bg-dark text-light border-dark"
            id="weight"
            name="weight"
            value="{{ old('weight') ?? $animal->weight }}"
            placeholder="Ex: 3"
          >
          @error('weight')
            <strong class="invalid-feedback d-block">{{ $message }}</strong>
          @enderror
        </div>
      </div>

      <div class="mb-3 row">
        <label
          for="size"
          class="col-sm-2 col-form-label"
        >Porte:</label>
        <div class="col-sm-10">
          <select
            class="form-select bg-dark text-light border-dark"
            id="size"
            name="size"
          >
            <option {{ (old('size') ?? $animal->size) != 'Pequeno' ?: 'selected' }}>Pequeno</option>
            <option {{ (old('size') ?? $animal->size) != 'Médio' ?: 'selected' }}>Médio</option>
            <option {{ (old('size') ?? $animal->size) != 'Grande' ?: 'selected' }}>Grande</option>
          </select>
          @error('size')
            <strong class="invalid-feedback d-block">{{ $message }}</strong>
          @enderror
        </div>
      </div>

      <div class="mb-3 row">
        <label
          for="genre"
          class="col-sm-2 col-form-label"
        >Gênero:</label>
        <div class="col-sm-10">
          <select
            class="form-select bg-dark text-light border-dark"
            id="genre"
            name="genre"
          >
            <option
              value="F"
              {{ (old('genre') ?? $animal->genre) != 'F' ?: 'selected' }}
            >Feminino</option>
            <option
              value="M"
              {{ (old('genre') ?? $animal->genre) != 'M' ?: 'selected' }}
            >Masculino</option>
          </select>
          @error('genre')
            <strong class="invalid-feedback d-block">{{ $message }}</strong>
          @enderror
        </div>
      </div>

      <div class="mb-3 row">
        <label
          for="specie_id"
          class="col-sm-2 col-form-label"
        >Espécie:</label>
        <div class="col-sm-10">
          <select
            class="form-select bg-dark text-light border-dark"
            id="specie_id"
            name="specie_id"
          >
            @foreach ($species as $specie)
              <option
                {{ (old('specie_id') ?? $animal->specie_id) != $specie->id ?: 'selected' }}
                value="{{ $specie->id }}"
              >{{ $specie->name }}</option>
            @endforeach
          </select>
          @error('size')
            <strong class="invalid-feedback d-block">{{ $message }}</strong>
          @enderror
        </div>
      </div>

      <div class="mb-3 row">
        <label
          for="breed_id"
          class="col-sm-2 col-form-label"
        >Raça:</label>
        <div class="col-sm-10">
          <select
            class="form-select bg-dark text-light border-dark"
            id="breed_id"
            name="breed_id"
          >
          </select>
          @error('breed_id')
            <strong class="invalid-feedback d-block">{{ $message }}</strong>
          @enderror
        </div>
      </div>

      <div class="mb-3 row">
        <label
          for="address"
          class="col-sm-2 col-form-label"
        >Local:</label>
        <div class="col-sm-10">
          <input
            type="text"
            class="form-control bg-dark text-light border-dark"
            id="address"
            name="address"
            value="{{ old('address') ?? $animal->address }}"
            placeholder="Ex: Centro"
          >
          @error('address')
            <strong class="invalid-feedback d-block">{{ $message }}</strong>
          @enderror
        </div>
      </div>

      <div class="mb-3 row">
        <label
          for="description"
          class="col-sm-2 col-form-label"
        >Descrição:</label>
        <div class="col-sm-10">
          <textarea
            type="text"
            id="description"
            name="description"
          >{{ old('description') ?? $animal->description }}</textarea>
          @error('description')
            <strong class="invalid-feedback d-block">{{ $message }}</strong>
          @enderror
        </div>
      </div>

      <button
        type="button"
        class="btn btn-light d-block mx-auto  mb-3"
        id="gallery-btn"
      >Adicionar Foto</button>
      @error('gallery')
        <strong class="invalid-feedback d-block">{{ $message }}</strong>
      @enderror

      <div
        class="row"
        id="gallery-row"
      >
        @foreach ($animal->galleries as $index => $gallery)
          <div class="col-12 mb-3 row">
            <label class="col-sm-2 col-form-label">Imagem:</label>
            <div class="col-sm-9">
              <img
                class="img-fluid mb-2"
                width="500"
                height="500"
                src="{{ asset('storage/' . $gallery->file_path) }}"
              >
              <input hidden name="gallery[{{ $index }}][id]" value="{{ $gallery->id }}">
              <input
                type="file"
                class="form-control bg-dark text-light border-dark"
                name="gallery[{{ $index }}][image]"
                accept="image/*"
                onchange="previewImage(this)"
              >
            </div>
            <div class="col-sm-1 mb-3">
              <span
                class="btn btn-danger"
                onclick="removeGallery(this)"
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
      <div class="mb-3 row">
        <label
          for="is_active"
          class="col-sm-2 col-form-label"
        >Ativo:</label>
        <div class="col-sm-10 pt-2">
          <div class="form-check form-switch">
            <input
              class="form-check-input"
              type="checkbox"
              id="is_active"
              name="is_active"
              @if (old('is_active') || $animal->is_active) checked @endif
              value="1"
            >

          </div>
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
  <script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>
  <script>
    ClassicEditor
      .create(document.querySelector('#description'))

    let galleryQuantity = {{ $animal->galleries->count() }};
    const specieSelect = document.getElementById('specie_id');
    const galleryRow = document.getElementById('gallery-row');
    const galleryBtn = document.querySelector('button#gallery-btn');
    const breedSelect = document.getElementById('breed_id');

    function removeGallery(element) {
      element.parentNode.parentNode.remove()
      galleryQuantity--
    }

    function previewImage(element) {
      element.parentNode.querySelector('img').src = URL.createObjectURL(element.files[0]);
    }
    async function fetchBreeds() {
      const response = await fetch("{{ route('breed.index') }}?specie_id=" + specieSelect.value);
      const data = await response.json();
      breedSelect.innerHTML = data.breeds.reduce((acc, breed) => {
        return acc +
          `<option value="${breed.id}" ${'{{ old("breed_id") ?? $animal->breed_id }}' == breed.id ? 'selected' : ''}>${breed.name}</option>`
      }, '');
    }
    specieSelect.addEventListener('change', fetchBreeds);
    fetchBreeds();
    galleryBtn.addEventListener('click', () => {
      if (galleryQuantity == 5) {
        return alert('Você atingiu o limite de 5 imagens!')
      }
      galleryRow.innerHTML += `        <div class="col-12 mb-3 row">
          <label class="col-sm-2 col-form-label">Imagem:</label>
          <div class="col-sm-9">
            <img class="img-fluid mb-2" width="500" height="500">
            <input
              type="file"
              class="form-control bg-dark text-light border-dark"
              name="gallery[][image]"
              accept="image/*"
              onchange="previewImage(this)"
              required
            >
          </div>
          <div class="col-sm-1 mb-3">
            <span
              class="btn btn-danger"
              onclick="removeGallery(this)"
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
        </div>`
      galleryQuantity++
    })
  </script>
@endsection
