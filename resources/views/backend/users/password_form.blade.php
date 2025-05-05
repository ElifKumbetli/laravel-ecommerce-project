@extends('backend.shared.backend_theme')

@section('title', 'Kullanıcı Modülü')
@section('subtitle', 'Şifre Değiştir')
@section('btn_url', url('/users'))
@section('btn_label', 'Geri Dön')
@section('btn_icon', 'arrow-left')

@section('content')

    <form action="{{ url('/users/' . $user->user_id . '/change-password') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-lg-6">
                <x-input label="Şifre Giriniz" placeholder="Şifre giriniz" field="password" type="password" />
            </div>
            <div class="col-lg-6">
                <x-input label="Şifre Tekrarı" placeholder="Şifrenizi tekrar giriniz" field="password_confirmation"
                    type="password" />
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <button type="submit" class="btn btn-primary mt-2">Kaydet</button>
            </div>
        </div>
        </div>
    </form>

@endsection
