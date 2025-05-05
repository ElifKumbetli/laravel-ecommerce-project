@extends('backend.shared.backend_theme')

@section('title', 'Kullanıcı Modülü')
@section('subtitle', 'Yeni Kullanıcı Ekle')
@section('btn_url', url('/users'))
@section('btn_label', 'Geri Dön')
@section('btn_icon', 'arrow-left')

@section('content')
    <form action="{{ url('/users') }}" method="POST">
        @csrf

        <div class="row">
            <div class="col-lg-6">
                <x-input label="Ad Soyad" placeholder="Ad Soyad giriniz" field="name" />

            </div>

            <div class="col-lg-6">
                <x-input label="Eposta" placeholder="Eposta giriniz" field="email" type="email" />


            </div>
        </div>

        <div class="row mt-3">
            <div class="col-lg-6">
                <x-input label="Şifre Giriniz" placeholder="Şifre Giriniz" field="password" type="password" />

            </div>

            <div class="col-lg-6">
                <x-input label="Şifre Tekrarı" placeholder="Şifrenizi tekrar giriniz" field="password" type="password" />
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <x-checkbox field="is_admin" label="Yetkili Kullanıcı" />
            </div>
            <div class="col-lg-6">
                <x-checkbox field="is_active" label="Aktif Kullanıcı" />
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <button type="submit" class="btn btn-primary mt-2"><span data-feather="save"></span> KAYDET
                </button>
            </div>
        </div>
    </form>
@endsection
