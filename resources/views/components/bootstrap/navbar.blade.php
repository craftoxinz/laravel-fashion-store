{{-- Navbar Start --}}
        <nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
            <div class="container">
                <a class="navbar-brand" href="#">Fashion</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="#">Beranda</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.products.*') ? 'active' : '' }}" href="#">Produk</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.orders.*') ? 'active' : '' }}"
                                aria-current="{{ request()->routeIs('admin.orders.*') ? 'page' : false }}"
                                href="{{ route('admin.orders.index') }}">
                                Order
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.employees.*') ? 'active' : '' }}"
                                aria-current="{{ request()->routeIs('admin.employees.*') ? 'page' : false }}"
                                href="{{ route('admin.employees.index') }}">
                                Pegawai
                            </a>
                        </li>
                        <li class="nav-item">
                            <a
                                class="nav-link {{ request()->routeIs('admin.suppliers.*') ? 'active' : '' }}"
                                aria-current="{{ request()->routeIs('admin.suppliers.*') ? 'page' : false }}"
                                href="{{ route('admin.suppliers.index') }}"
                            >
                                Supplier
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
{{-- Navbar End --}}
