@extends('components.layouts.panel')
@section('content')
  <main class="col h-100 text-light p-4">
    <div class="d-flex justify-content-between mb-4">
      <h1 class="h3">Adoções</h1>
    </div>

    <div class="d-flex justify-content-between align-items-end mb-3">
      <form class="bg-custom rounded col-12 py-3 px-4">

        <div class="row align-items-end row-gap-4">
          <div class="col-3 d-flex flex-wrap">
            <label
              for="search"
              class="col-form-label"
            >Solicitante:</label>
            <div class="col-12">
              <input
                type="text"
                class="form-control bg-dark text-light border-dark"
                id="search"
                placeholder="Ex: Cachorro"
                name="name"
              >
            </div>
          </div>

          <div class="col-3 d-flex flex-wrap">
            <label
              for="search"
              class="col-form-label"
            >Animal:</label>
            <div class="col-12">
              <input
                type="text"
                class="form-control bg-dark text-light border-dark"
                id="search"
                placeholder="Ex: Cachorro"
                name="animal"
              >
            </div>
          </div>

          <div class="col-5 row">
            <div class="col-12 col-form-label">Data:</div>

            <div class="col-6 d-flex gap-2">
              <label
                for="de"
                class="col-form-label"
              >De:</label>
              <input
                type="date"
                class="form-control bg-dark text-light border-dark"
                id="de"
                name="start_date"
              >
            </div>

            <div class="col-6 d-flex gap-2">
              <label
                for="ate"
                class="col-form-label"
              >Até:</label>
              <input
                type="date"
                class="form-control bg-dark text-light border-dark"
                id="ate"
                name="end_date"
              >
            </div>
          </div>

          <div class="col d-flex justify-content-end">
            <input
              type="submit"
              name="export"
              value="Exportar CSV"
              class="btn btn-light"
            >
            <button
              type="submit"
              class="btn btn-light"
            >Filtrar</button>
          </div>
        </div>
      </form>
    </div>

    @if (session()->has('success'))
      <div class="alert alert-success">{{ session()->get('success') }}</div>
    @endif

    <div class="bg-custom rounded overflow-hidden">

      <table class="table mb-0 table-custom table-dark align-middle">
        <thead>
          <tr>
            <th
              scope="col"
              class="text-uppercase"
            >Solicitante</th>
            <th
              scope="col"
              class="text-uppercase"
            >Animal</th>
            <th
              scope="col"
              class="text-uppercase text-center"
            >Data de cadastro</th>
            <th
              scope="col"
              class="text-uppercase text-center"
            >Ações</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($adoptions as $adoption)
            <tr>
              <td>{{ $adoption->name }}</td>
              <td>{{ $adoption->animal->name }}</td>
              <td>{{ $adoption->created_at->format('d/m/Y') }}</td>
              <td>
                <div class="d-flex justify-content-center">
                  <button
                    type="button"
                    class="btn btn-light d-flex justify-content-center align-items-center rounded-circle p-2 mx-2"
                    data-bs-toggle="modal"
                    data-bs-target="#exampleModal"
                    onclick="showDetails({{ $adoption->load(['animal']) }})"
                  >
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      width="16"
                      height="16"
                      fill="currentColor"
                      class="bi bi-search"
                      viewBox="0 0 16 16"
                    >
                      <path
                        d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"
                      />
                    </svg>
                  </button>
                </div>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="3">Nenhuma adoção encontrada!</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>

    <div class="mt-2">
      {{ $adoptions->withQueryString()->links() }}
    </div>
  </main>
  <div
    class="modal fade"
    id="exampleModal"
    tabindex="-1"
    aria-labelledby="exampleModalLabel"
    aria-hidden="true"
  >
    <div class="modal-dialog modal-dialog-centered text-light">
      <div class="modal-content bg-custom">
        <div class="modal-header">
          <h1
            class="modal-title fs-5"
            id="exampleModalLabel"
          >Usuário</h1>
          <button
            type="button"
            class="btn-close btn-close-white"
            data-bs-dismiss="modal"
            aria-label="Close"
          ></button>
        </div>
        <div class="modal-body d-flex flex-wrap row-gap-4">
          <div class="col-6">
            <div><small>Solicitante:</small></div>
            <div id="adoption-name"></div>
          </div>
          <div class="col-6">
            <div><small>Animal:</small></div>
            <div id="adoption-animal"></div>
          </div>
          <div class="col-6">
            <div><small>CPF:</small></div>
            <div id="adoption-document"></div>
          </div>
          <div class="col-6">
            <div><small>Celular:</small></div>
            <div id="adoption-phone"></div>
          </div>
          <div class="col-6">
            <div><small>Email:</small></div>
            <div id="adoption-email"></div>
          </div>
          <div class="col-6">
            <div><small>Data de nascimento:</small></div>
            <div id="adoption-birth-date"></div>
          </div>
        </div>

        <div class="modal-footer">
          <button
            type="button"
            class="btn btn-danger"
            data-bs-dismiss="modal"
          >Fechar</button>
        </div>
      </div>
    </div>
  </div>
  </div>
  <script>
    function showDetails(data) {
      document.getElementById('adoption-name').innerHTML = data.name;
      document.getElementById('adoption-email').innerHTML = data.email;
      document.getElementById('adoption-birth-date').innerHTML = new Date(data.birth_date).toLocaleString('pt-BR');
      document.getElementById('adoption-phone').innerHTML = data.phone;
      document.getElementById('adoption-document').innerHTML = data.document;
      document.getElementById('adoption-animal').innerHTML = data.animal.name;
    }
  </script>
@endsection
