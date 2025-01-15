<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'usuario' => 'required|unique:users',
            'email' => 'required|unique:users',
            'primerNombre' => 'required',
            'segundoNombre' => 'required',
            'primerApellido' => 'required',
            'segundoApellido' => 'required',
            'idDepartamento' => 'required|exists:departamentos,id',
            'idCargo' => 'required|exists:cargos,id'
        ];
    }
}
