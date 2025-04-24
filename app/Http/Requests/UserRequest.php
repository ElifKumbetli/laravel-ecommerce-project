<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     * Kullanıcının bu isteği yapmak konusunda yetkisi var mı?
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
        $user_id = $this->request->get("user_id");
        return [
            'name' => 'required|sometimes|min:3',
            'email' => 'required|sometimes|email|unique:users,email,' . $this->user_id . ',user_id',
            'password' => 'required|sometimes|string|min:5|confirmed'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Bu alan zorunludur.',
            'name.min' => 'Ad soyad alanı en az 3 karakterden oluşmalıdır.',
            'email.required' => 'Bu alan zorunludur.',
            'email.email' => 'Girdiğiniz değer eposta formatına uygun olmalıdır.',
            'email.unique' => 'Girdiğiniz e-posta sistemde kayıtlıdır.',
            'password.required' => 'Bu alan zorunludur.',
            'password.min' => 'Şifre alanı en az 5 karakterden oluşmalıdır.',
            'password.confirmed' => 'Girilen şifreler aynı değildir.',
            
        ];
    }

}
