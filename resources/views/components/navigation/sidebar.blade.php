<aside
  class="bg-custom text-light py-4"
  style="width: 250px;"
>
  <div class="menu">
    @if (auth()->user()->is_superadmin)
      <div class="item">
        <div
          class="w-100 d-flex align-items-center gap-2 link-light text-decoration-none mt-2 py-3 px-3"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#menu-usuario"
          aria-expanded="true"
          aria-controls="menu-usuario"
        >
          <svg
            xmlns="http://www.w3.org/2000/svg"
            width="18"
            height="18"
            fill="currentColor"
            class="bi bi-person-fill"
            viewBox="0 0 16 16"
          >
            <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
          </svg>

          Usuários
        </div>

        <div
          class="collapse"
          id="menu-usuario"
        >
          <div class="bg-dark d-flex flex-column rounded mx-4 p-2 row-gap-1">
            <a
              href="{{ route('panel.user.create') }}"
              class="submenu-link link-light text-decoration-none rounded p-2"
            >
              <small class="d-flex justify-content-between align-items-center">
                Cadastrar
              </small>
            </a>
            <a
              href="{{ route('panel.user.index') }}"
              class="submenu-link link-light text-decoration-none rounded p-2"
            >
              <small class="d-flex justify-content-between align-items-center">
                Listagem

              </small>
            </a>
          </div>
        </div>
      </div>
    @endif
    <div class="item">
      <div
        class="w-100 d-flex align-items-center gap-2 link-light text-decoration-none mt-2 py-3 px-3"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#menu-specie"
        aria-expanded="true"
        aria-controls="menu-specie"
      >
        <x-iconsax-bol-pet
          width="18"
          height="18"
        />

        Espécies
      </div>

      <div
        class="collapse"
        id="menu-specie"
      >
        <div class="bg-dark d-flex flex-column rounded mx-4 p-2 row-gap-1">
          <a
            href="{{ route('panel.specie.create') }}"
            class="submenu-link link-light text-decoration-none rounded p-2"
          >
            <small class="d-flex justify-content-between align-items-center">
              Cadastrar
            </small>
          </a>
          <a
            href="{{ route('panel.specie.index') }}"
            class="submenu-link link-light text-decoration-none rounded p-2"
          >
            <small class="d-flex justify-content-between align-items-center">
              Listagem

            </small>
          </a>
        </div>
      </div>
    </div>

    <div class="item">
      <div
        class="w-100 d-flex align-items-center gap-2 link-light text-decoration-none mt-2 py-3 px-3"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#menu-animal"
        aria-expanded="true"
        aria-controls="menu-animal"
      >
        <x-maki-animal-shelter
          width="18"
          height="18"
        />

        Animais
      </div>

      <div
        class="collapse"
        id="menu-animal"
      >
        <div class="bg-dark d-flex flex-column rounded mx-4 p-2 row-gap-1">
          <a
            href="{{ route('panel.animal.create') }}"
            class="submenu-link link-light text-decoration-none rounded p-2"
          >
            <small class="d-flex justify-content-between align-items-center">
              Cadastrar
            </small>
          </a>
          <a
            href="{{ route('panel.animal.index') }}"
            class="submenu-link link-light text-decoration-none rounded p-2"
          >
            <small class="d-flex justify-content-between align-items-center">
              Listagem

            </small>
          </a>
        </div>
      </div>
    </div>

    <div class="item">
      <div
        class="w-100 d-flex align-items-center gap-2 link-light text-decoration-none mt-2 py-3 px-3"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#menu-adoption"
        aria-expanded="true"
        aria-controls="menu-adoption"
      >
        <svg
          xmlns="http://www.w3.org/2000/svg"
          width="18"
          height="18"
          fill="currentColor"
          class="bi bi-person-fill"
          viewBox="0 0 16 16"
        >
          <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
        </svg>

        Adoções
      </div>

      <div
        class="collapse"
        id="menu-adoption"
      >
        <div class="bg-dark d-flex flex-column rounded mx-4 p-2 row-gap-1">
          <a
            href="{{ route('panel.adoption.index') }}"
            class="submenu-link link-light text-decoration-none rounded p-2"
          >
            <small class="d-flex justify-content-between align-items-center">
              Listagem

            </small>
          </a>
        </div>
      </div>
    </div>
    <form
      action="{{ route('panel.logout') }}"
      method="POST"
      class="w-100 d-flex align-items-center gap-2 link-light text-decoration-none mt-2 py-3 px-3 ms-1 icon-link icon-link-hover"
      style="--bs-icon-link-transform: translate3d(-.125rem, 0, 0);"
    >
      @csrf
      <svg
        xmlns="http://www.w3.org/2000/svg"
        width="18"
        height="18"
        fill="currentColor"
        class="bi bi-box-arrow-left"
        viewBox="0 0 16 16"
      >
        <path
          fill-rule="evenodd"
          d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z"
        />
        <path
          fill-rule="evenodd"
          d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"
        />
      </svg>

      <button class="btn text-white">Sair</button>
    </form>
  </div>
</aside>
