<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class CategoryRequest extends FormRequest
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
        //$user_id = $this->request->get("user_id");
        return [
            'name' => 'required',
            'slug' => 'required|sometimes|unique:slug,',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Bu alan zorunludur.',
            'slug.required' => 'Bu alan zorunludur.',
            'slug.unique' => 'Girdiğiniz :attribute sistemde kayıtlıdır.',
        ];
    }
}
