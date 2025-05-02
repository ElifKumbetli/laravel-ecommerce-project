@extends("backend.shared.backend_theme")

@section("title", "Kullanıcı Adres Modülü")
@section("subtitle", "Yeni Adres Ekle")
@section("btn_url", url("/users"))
@section("btn_label", "Geri Dön")
@section("btn_icon", "arrow-left")

@section("content")
<form action="{{ url("/users/{$user->user_id}/addresses") }}" method="POST" autocomplete="off" novalidate>
  @csrf
  <input type="hidden" name="user_id" value="{{ $user->user_id }}">

  <div class="row">
    <div class="col-lg-6">
      <label for="city" class="form-label">Şehir</label>
      <input type="text" class="form-control" id="city" name="city" 
      value="{{ old('city') }}" placeholder="Şehir giriniz">
      @error("city")
        <span class="text-danger">{{ $message }}</span>
      @enderror
    </div>

    <div class="col-lg-6">
      <label for="district" class="form-label">İlçe</label>
      <input type="text" class="form-control" id="district" name="district"
      value="{{ old('district') }}"
      placeholder="İlçe giriniz">
      @error("district")
        <span class="text-danger">{{ $message }}</span>
      @enderror
    </div>
  </div>

  <div class="row mt-3">
    <div class="col-lg-6">
      <label for="zipcode" class="form-label">Posta Kodu</label>
      <input type="text" class="form-control" id="zipcode" name="zipcode"
      value="{{ old('zipcode') }}" placeholder="Posta kodu giriniz">
      @error("zipcode")
        <span class="text-danger">{{ $message }}</span>
      @enderror
    </div>

    <div class="col-lg-6 mt-4">
      <div class="form-check">
        <input class="form-check-input" type="checkbox" id="is_default" name="is_default" value="1">
        <label class="form-check-label" for="is_default">Varsayılan</label>
      </div>
    </div>
  </div>

  <div class="row mt-4">
    <div class="col-lg-12">
      <label for="address" class="form-label">Açık Adres</label>
      <textarea name="address" id="address" cols="20" rows="5" class="form-control"></textarea>
      @error("address")
      <span class="text-danger">{{ $message }}</span>
    @enderror
    </div>
  </div>

  <div class="row mt-3">
    <div class="col-12">
      <button type="submit" class="btn btn-primary">Kaydet</button>
    </div>
  </div>
</form>
@endsection
