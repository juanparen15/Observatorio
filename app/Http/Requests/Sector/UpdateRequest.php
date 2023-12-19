<?php

namespace App\Http\Requests\Sector;

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
            // 'codS' => 'required',
            // 'nomS' => 'required',
            'codS' => 'unique:sectores,codS,'.$this->route('sector')->id.'|required',
            'nomS' => 'unique:sectores,nomS,'.$this->route('sector')->id.'|required',
            // 'fK_pDes' => 'required', 
            'fK_pDes' =>'integer|required|exists:App\PlanDesarrollo,id',
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
