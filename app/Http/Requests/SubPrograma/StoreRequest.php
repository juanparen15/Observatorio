<?php

namespace App\Http\Requests\SubPrograma;

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
            'codSP' => 'required',
            'nomSP' => 'required',
            'fK_programa'=>'required'
        ];
    }
}
