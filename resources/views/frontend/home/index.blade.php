<!doctype html>
<html lang="tr" data-bs-theme="auto">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>E-Ticaret Projemiz </title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])


    <style>
        .sidebar {
            height: 100vh;
        }

        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .b-example-divider {
            width: 100%;
            height: 3rem;
            background-color: rgba(0, 0, 0, .1);
            border: solid rgba(0, 0, 0, .15);
            border-width: 1px 0;
            box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
        }

        .b-example-vr {
            flex-shrink: 0;
            width: 1.5rem;
            height: 100vh;
        }

        .bi {
            vertical-align: -.125em;
            fill: currentColor;
        }

        .nav-scroller {
            position: relative;
            z-index: 2;
            height: 2.75rem;
            overflow-y: hidden;
        }

        .nav-scroller .nav {
            display: flex;
            flex-wrap: nowrap;
            padding-bottom: 1rem;
            margin-top: -1px;
            overflow-x: auto;
            text-align: center;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
        }

        .btn-bd-primary {
            --bd-violet-bg: #712cf9;
            --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

            --bs-btn-font-weight: 600;
            --bs-btn-color: var(--bs-white);
            --bs-btn-bg: var(--bd-violet-bg);
            --bs-btn-border-color: var(--bd-violet-bg);
            --bs-btn-hover-color: var(--bs-white);
            --bs-btn-hover-bg: #6528e0;
            --bs-btn-hover-border-color: #6528e0;
            --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
            --bs-btn-active-color: var(--bs-btn-hover-color);
            --bs-btn-active-bg: #5a23c8;
            --bs-btn-active-border-color: #5a23c8;
        }

        .bd-mode-toggle {
            z-index: 1500;
        }

        .bd-mode-toggle .bi {
            width: 1em;
            height: 1em;
        }

        .bd-mode-toggle .dropdown-menu .active .bi {
            display: block !important;
        }
    </style>

    <!-- Custom styles for this template -->
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="/">PROJE</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="/">Anasayfa</a>
                                </li>
                                @auth()
                                    <li class="nav-item">
                                        <a class="nav-link" href="/sepetim">Sepetim</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="/cikis">Çıkış</a>
                                    </li>
                                @else
                                    <li class="nav-item">
                                        <a class="nav-link" href="/giris">Giriş Yap</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="/uye-ol">Üye ol</a>
                                    </li>
                                @endauth
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3 pt-4">
                <h5>Kategoriler</h5>
                <div class="list-group">
                    <a href="/" class="list-group-item list-group-item-action">Hepsi</a>
                    @if (count($categories) > 0)
                        @foreach ($categories as $category)
                            <a href="/kategori/{{ $category->slug }}"
                                class="list-group-item list-group-item-action">{{ $category->name }}</a>
                        @endforeach
                    @endif
                </div>
            </div>
            <div class="col-sm-9 pt-4">
                <h5>Ürünler</h5>
                @if (count($products) > 0)
                    <div class="card-group">
                        @foreach ($products as $product)
                            <div class="card" style="width: 18rem;">
                                <img src="{{ asset('/storage/products/' . $product->images[0]->image_url) }}"
                                    class="card-img-top" alt="{{ $product->images[0]->alt }}">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $product->name }}</h5>
                                    <h6 class="card-title">Fiyat: {{ $product->price }}TL</h6>
                                    <p class="card-text">{{ $product->lead }}</p>
                                    <a href="{{ url('/sepete-ekle/' . $product->product_id) }}"
                                        class="btn btn-primary">Sepete Ekle</a>


                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
</body>
<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>

</html>
