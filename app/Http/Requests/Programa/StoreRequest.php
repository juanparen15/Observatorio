<?php

namespace App\Http\Requests\Programa;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            // 'codProg' => 'required',
            // 'nomProg' => 'required',
            // 'fK_sector' => 'required',
            'codProg' => 'required|unique:programas',
            'nomProg' => 'required|unique:programas',
            'fK_sector'=>'integer|required|exists:App\Sector,id',
        ];
    }
    public function messages()
    {
        return[
            'codProg.required'=> 'Este Campo es Requerido',
            'nomProg.required'=> 'Este Campo es Requerido',
            'fK_sector.required'=>'Este Campo es Requerido',
            
        ];
        
    }
}
