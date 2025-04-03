<?php

namespace App\Http\Requests;

use App\Models\Anillo;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class AnilloFormRequest extends FormRequest
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


        switch ($this->method()) {
            case "POST": {
                    return [
                        'title' => 'required|string|min:3|max:150',
                        'model' => 'required|string|min:3|max:150',
                        'description' => 'required',
                        'price' => 'required|string|min:3|max:150',
                        'status' => 'required|string|min:3|max:150',
                    ];
                }
            case "PUT": {
                    return [
                        'title' => 'required|string|min:3|max:150',
                        'model' => 'required|string|min:3|max:150',
                        'description' => 'required',
                        'price' => 'required|string|min:3|max:150',
                        'status' => ['required'],
                    ];
                }
            default: {
                    return [];
                }
        }
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success'   => false,
            'message'   => 'Validation errors',
            'data'      => $validator->errors()

        ],  422));
    }

    // public function messages()
    // {
    //     return [
    //         'name.required' => 'Nombre es requerido',
    //     ];
    // }
}
