<?php

namespace App\Http\Requests\Area;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
        return [
           'nomA' => 'unique:areas,nomA,'.$this->route('area')->id.'|required',
           'fK_car'=>'integer|required|exists:App\Cartera,id',

        ];
    }
    public function messages()
    {
        return[
            'nomA.required'=> 'Este Campo es Requerido',
            'fK_car.required'=>'Este Campo es Requerido',
           
        ];
        
    }
}
