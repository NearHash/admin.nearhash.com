<?php

namespace App\Http\Requests\API\V1\Users;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CreateProfileRequest extends FormRequest
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
        $id = Request::instance()->id ? Request::instance()->id : $this->user()->id;

        $rules = [
            'name' => ['required','max:255', Rule::unique('users', 'name')->ignore($id)],
            'phone' => ['required','regex:/^([0-9\s\-\+\(\)]*)$/','min:8','max:13', Rule::unique('users', 'phone')->ignore($id)],
            'address' => 'max:255',
        ];

        if($this->attributes->has('phone')) {
            $rules['phone'] = ['regex:/^([0-9\s\-\+\(\)]*)$/','min:8','max:13', Rule::unique('users', 'phone_no_two')->ignore($id)];
        }

        if($this->attributes->has('image')) {
            $rules['image'] = 'image|mimes:jpeg,png,jpg|max:10240'; // 10 MB
        }

        return $rules;
    }
}
