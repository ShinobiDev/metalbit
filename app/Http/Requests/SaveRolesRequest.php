<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveRolesRequest extends FormRequest
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
              'display_name' =>'required',
        ];


        if ($this->method() !== 'PUT') {

          $rules['name'] = 'required|unique:roles' ;

        }


        return $rules;

    }

    public function messages(){

      return [
        'name.required' => 'El Identficador del role es requerido',
        'name.unique' => 'El Identficador ya esta registrado',
        'display_name.required' => 'El Nombre del role es requerido'
      ];


    }
}
