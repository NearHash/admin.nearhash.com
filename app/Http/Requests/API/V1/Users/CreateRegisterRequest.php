<?php

namespace App\Http\Requests\API\V1\Users;

use Illuminate\Foundation\Http\FormRequest;

class CreateRegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
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
        $rules = [
            'name' => 'required|max:25',
            'phone' => ['required', 'unique:users,phone', 'min:8', 'max:13'],
            'password' => ['required', 'min:6'],
//            'password' => ['required', 'min:6', 'regex:/^(?=.*?[a-z])(?=.*?[0-9]).{8,}$/'],
        ];

        if($this->attributes->has('image')) {
            $rules['image'] = 'image|mimes:jpeg,png,jpg,webp|max:10240'; // 10 MB
        }

        return $rules;
    }
}
