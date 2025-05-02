<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddressRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [

            'user_id' => 'required|numeric', // Kullanıcı kimliği
            'city' => 'required|min:3', // Şehir, en az 3 karakter
            'district' => 'required|min:3', // İlçe, en az 3 karakter
            'zipcode' => 'required|min:3', // Posta kodu, en az 3 karakter
            'address' => 'required|min:10', // Adres, en az 10 karakter

        ];
    }
    public function messages()
    {
        return [
            'user_id.required' => 'Bu alan zorunludur.',
            'user_id.numeric' => 'Bu alan sayısal olmak zorundadır.',
            'city.required' => 'Bu alan zorunludur.',
            'city.min' => 'En az 3 karakterden oluşmalıdır',
            'district.required' => 'Bu alan zorunludur.',
            'district.min' => 'En az 3 karakterden oluşmalıdır',
            'zipcode.required' => 'Bu alan zorunludur.',
            'zipcode.min' => 'En az 3 karakterden oluşmalıdır',
            'address.required' => 'Bu alan zorunludur.',
            'address.min' => 'En az 10 karakterden oluşmalıdır',
        ];
    }
}
