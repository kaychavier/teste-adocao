@extends('components.layouts.public')
@section('content')
  <nav
    aria-label="breadcrumb"
    class="p-3 ps-5 bg-custom-light"
  >
    <div class="container">
      <ol class="breadcrumb m-0">
        <li class="breadcrumb-item fs-sm"><a>Home</a></li>
        <li
          class="breadcrumb-item active fs-sm"
          aria-current="page"
        >Quero Adotar</li>
      </ol>
    </div>
  </nav>

  <section>
    <div class="container-fluid">
      <div class="row">
        <aside style="width: 320px;">
          <form
            method=""
            class="bg-custom rounded p-3 text-uppercase pt-4 mt-2 position-sticky"
            style="top: 1rem;"
          >
            <div class="mb-3 text-light bowlby-one">
              Filtros
            </div>

            <div class="form-group py-2">
              <label
                for="especie"
                class="text-capitalize text-light"
              >Espécie</label>
              <select
                name="specie_id"
                id="especie"
                class="form-control form-select"
              >
                <option
                  value=""
                  selected
                  disabled
                >Selecione</option>
                @foreach($species as $specie)
                <option {{ request()->specie_id != $specie->id ?: 'selected' }} value="{{ $specie->id }}">{{ $specie->name }}</option>
                @endforeach
              </select>
            </div>

            <div class="form-group py-2">
              <label
                for="raca"
                class="text-capitalize text-light"
              >Raça</label>
              <select
                name="breed_id"
                id="raca"
                class="form-control form-select"
              >
                <option
                  value=""
                  selected
                  disabled
                >Selecione</option>
              </select>
            </div>

            <div class="form-group py-2">
              <label
                for="local"
                class="text-capitalize text-light"
              >Local</label>
              <input
                type="text"
                class="form-control"
                name="address"
                id="local"
                value="{{ request()->address }}"
                placeholder="Ex: São Paulo"
              >
            </div>

            <div class="form-group py-2">
              <label
                for="porte"
                class="text-capitalize text-light"
              >Porte</label>
              <select
                name="size"
                id="porte"
                class="form-control form-select"
              >
                <option
                  value=""
                  selected
                  disabled
                >Selecione</option>
                <option {{ request()->size != 'Pequeno' ?: 'selected' }}>Pequeno</option>
                <option {{ request()->size != 'Médio' ?: 'selected' }}>Médio</option>
                <option {{ request()->size != 'Grande' ?: 'selected' }}>Grande</option>
              </select>
            </div>

            <div class="form-group py-2">
              <div class="w-100 text-capitalize text-light">Sexo</div>

              <div class="bg-light p-2 rounded d-flex flex-wrap row-gap-2">
                <div class="form-check form-check-inline">
                  <input
                    class="form-check-input"
                    type="radio"
                    name="genre"
                    id="femea"
                    value="F"
                    {{ request()->genre != 'F' ?: 'checked'}}
                  >
                  <label
                    class="form-check-label text-capitalize"
                    for="femea"
                  >Fêmea</label>
                </div>

                <div class="form-check form-check-inline">
                  <input
                    class="form-check-input"
                    type="radio"
                    name="genre"
                    id="macho"
                    value="M"
                    {{ request()->genre != 'M' ?: 'checked'}}
                  >
                  <label
                    class="form-check-label text-capitalize"
                    for="macho"
                  >Macho</label>
                </div>
              </div>
            </div>

            <div class="form-group d-flex justify-content-between">
              <a
                href="{{ route('animal.index') }}"
                class="btn btn-custom-2 mt-4"
                style="text-transform: initial"
              >Limpar</a>
              <button
                type="submit"
                class="btn btn-custom-2 mt-4"
              >Buscar</button>
            </div>
          </form>
        </aside>

        <main class="bg-light p-4 pb-5 col">
          <h2 class="h4 py-2 pb-0 text-uppercase m-0 bowlby-one">Quero Adotar</h2>
          <p class="m-0 pb-2">Conheça os pets disponíveis para adoção</p>

          <div class="row row-gap-4 mt-4">
            @forelse ($animals as $animal)
              <div class="col-xxl-3 col-4">
                <div class="card rounded overflow-hidden">
                  <a href="{{ route('animal.show', $animal) }}">
                    <img
                      src="{{ asset('storage/' . $animal->galleries[0]->file_path) }}"
                      class="w-100 object-fit-cover"
                      height="320"
                    >
                  </a>

                  <div class="p-3">
                    <p class="m-0 fs-sm">Cód. {{ $animal->id }}</p>

                    <div class="d-flex align-items-center gap-2 mt-2 py-2">
                      <h3 class="h4 m-0">{{ $animal->name }}</h3>
                      @if ($animal->genre == 'M')
                        <svg
                          xmlns="http://www.w3.org/2000/svg"
                          width="18"
                          height="18"
                          fill="currentColor"
                          class="bi bi-gender-male"
                          viewBox="0 0 16 16"
                        >
                          <path
                            fill="#006AB0"
                            fill-rule="evenodd"
                            d="M9.5 2a.5.5 0 0 1 0-1h5a.5.5 0 0 1 .5.5v5a.5.5 0 0 1-1 0V2.707L9.871 6.836a5 5 0 1 1-.707-.707L13.293 2H9.5zM6 6a4 4 0 1 0 0 8 4 4 0 0 0 0-8z"
                          />
                        </svg>
                      @else
                        <svg
                          xmlns="http://www.w3.org/2000/svg"
                          width="18"
                          height="18"
                          fill="currentColor"
                          class="bi bi-gender-female"
                          viewBox="0 0 16 16"
                        >
                          <path
                            fill="#FF7373"
                            fill-rule="evenodd"
                            d="M8 1a4 4 0 1 0 0 8 4 4 0 0 0 0-8zM3 5a5 5 0 1 1 5.5 4.975V12h2a.5.5 0 0 1 0 1h-2v2.5a.5.5 0 0 1-1 0V13h-2a.5.5 0 0 1 0-1h2V9.975A5 5 0 0 1 3 5z"
                          />
                        </svg>
                      @endif
                    </div>

                    <p class="mb-4 fs-md">{{ $animal->address }}</p>

                    <a
                      href="{{ route('animal.show', $animal) }}"
                      class="btn btn-custom-2 d-flex align-items-center justify-content-center gap-2 w-100"
                    >
                      Quero Adotar

                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="16"
                        height="16"
                        fill="currentColor"
                        class="bi bi-heart-fill"
                        viewBox="0 0 16 16"
                      >
                        <path
                          fill-rule="evenodd"
                          d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"
                        />
                      </svg>
                    </a>
                  </div>
                </div>
              </div>
            @empty
              <div class="col-12">
                <h3>Nenhum animal encontrado!</h3>
              </div>
            @endforelse
          </div>
          {{ $animals->withQueryString()->links() }}
        </main>
      </div>
    </div>
  </section>
  <script>
    const specieSelect = document.getElementById('especie');
    const breedSelect = document.getElementById('raca');
    async function fetchBreeds() {
      const response = await fetch("{{ route('breed.index') }}?specie_id=" + specieSelect.value);
      const data = await response.json();
      breedSelect.innerHTML = data.breeds.reduce((acc, breed) => {
        return acc +
          `<option value="${breed.id}" ${'{{ request()->breed_id }}' == breed.id ? 'selected' : ''}>${breed.name}</option>`
      }, '');
    }
    specieSelect.addEventListener('change', fetchBreeds);
    fetchBreeds();
  </script>
@endsection
