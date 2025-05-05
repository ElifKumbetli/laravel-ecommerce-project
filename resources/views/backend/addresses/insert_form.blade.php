@extends('backend.shared.backend_theme')

@section('title', 'Kullanıcı Adres Modülü')
@section('subtitle', 'Yeni Adres Ekle')
@section('btn_url', url('/users'))
@section('btn_label', 'Geri Dön')
@section('btn_icon', 'arrow-left')

@section('content')
    <form action="{{ url("/users/{$user->user_id}/addresses") }}" method="POST" autocomplete="off" novalidate>
        @csrf
        <input type="hidden" name="user_id" value="{{ $user->user_id }}">

        <div class="row">
            <div class="col-lg-6">
                <x-input label="Şehir" placeholder="Şehir giriniz" field="city" />

            </div>

            <div class="col-lg-6">

                <x-input label="İlçe" placeholder="İlçe giriniz" field="district" />

            </div>
        </div>

        <div class="row mt-3">
            <div class="col-lg-6">
                <x-input label="Posta Kodu" placeholder="Posta Kodu giriniz" field="zipcode" />

            </div>

            <div class="col-lg-6 mt-4">
                <x-checkbox field="is_default" label="Varsayılan" />

            </div>
        </div>

        <div class="row mt-4">
            <div class="col-lg-12">
                <x-textarea label="Açık Adres" placeholder="Açık Adres giriniz" field="address" />
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Kaydet</button>
            </div>
        </div>
    </form>
@endsection
