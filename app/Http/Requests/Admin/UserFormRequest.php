<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UserFormRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => "required|max:50",
            'email' => "required|max:50",
            'password' => "required|min:6|max:20|confirmed",
            'grupo_id' => 'required'
        ];
    }
}
