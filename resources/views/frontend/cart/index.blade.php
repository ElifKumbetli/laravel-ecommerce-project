<!doctype html>
<html lang="tr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sepetim</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Vite ile CSS/JS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <!-- Navbar -->
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
                                    <a class="nav-link active" href="/">Anasayfa</a>
                                </li>
                                @auth
                                    <li class="nav-item">
                                        <a class="nav-link" href="/hesabim">Hesabım</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="/cikis">Çıkış</a>
                                    </li>
                                @else
                                    <li class="nav-item">
                                        <a class="nav-link" href="/giris">Giriş Yap</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="/uye-ol">Üye Ol</a>
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
                <h5>Hesabım</h5>
                <div class="list-group">
                    <a href="/sepetim" class="list-group-item list-group-item-action active">Sepetim</a>
                </div>
            </div>

            <div class="col-sm-9 pt-4">
                <h5>Sepetim</h5>

                @if (count($cart->details) > 0)
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Fotoğraf</th>
                                <th>Ürün</th>
                                <th>Adet</th>
                                <th>Fiyat</th>
                                <th>İşlemler</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cart->details as $detail)
                                <tr>
                                    <td>
                                        <img src="{{ asset('/storage/products/' . $detail->product->images[0]->image_url) }}"
                                            alt="{{ $detail->product->images[0]->alt }}" width="100">
                                    </td>
                                    <td>{{ $detail->product->name }}</td>
                                    <td>{{ $detail->quantity }}</td>
                                    <td>{{ $detail->product->price }} TL</td>
                                    <td>
                                        <a href="/sepetim/sil/{{ $detail->cart_detail_id }}"
                                            class="btn btn-sm btn-danger">Sil</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <a href="/satin-al" class="btn btn-success float-end">Satın Al</a>
                @else
                    <p class="text-danger text-center">Sepetinizde ürün bulunamadı.</p>
                @endif
            </div>
        </div>
    </div>
</body>

</html>
