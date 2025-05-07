<ul class="nav flex-column">
    <li class="nav-item">
        <a class="nav-link d-flex align-items-center gap-2 active" aria-current="page" href="#">
            <svg class="bi" aria-hidden="true">
                <use xlink:href="#house-fill" />
            </svg>
            Yönetim Paneli
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link d-flex align-items-center gap-2" href="/users">
            <span data-feather="users"></span>
            Kullanıcılar
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link {{ Str::of(url()->current())->contains('/categories') ? 'active' : '' }}" href="/categories">
            <span data-feather="grid"></span>
            Kategoriler
        </a>
    </li>

</ul>
