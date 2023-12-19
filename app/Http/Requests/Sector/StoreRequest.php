<?php

namespace App\Http\Requests\Sector;

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
            'codS' => 'required|unique:sectores',
            'nomS' => 'required|unique:sectores',
            'fK_pDes'=>'integer|required|exists:App\PlanDesarrollo,id',
            // 'codS' => 'required',
            // 'nomS' => 'required',
            // 'fK_pDes' => 'required',
        ];
    }
    public function messages()
    {
        return[
            'codS.required'=> 'Este Campo es Requerido',
            'nomS.required'=> 'Este Campo es Requerido',
            'fK_pDes.required'=>'Este Campo es Requerido',
            
        ];
        
    }
}
