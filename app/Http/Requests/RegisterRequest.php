<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
                'name' =>'required|string',
                'surname' =>'required|string',
                'birthday' =>'required|date',
                'gender'=>'required|integer',
                'phone' =>'required|string',
                'country_id' =>'required|integer',
                'province_id' =>'required|integer',
                'city_id' =>'required|integer',
                'adress' =>'required|string',
                'email' =>'required|string',
                'password' =>'required',
                'type_account' =>'required|integer',
                'cuit'  => 'required_if:type_account,==,3',
                'imagen_dni'=> 'required_if:type_account,==,3'
        ];
    }
    public function messages()
{
    return [
        'name.required' => 'El campo nombre es requerido',
        'surname.required' => 'El campo apellido es requerido',
        'birthday.required' =>'El campo fecha de nacimiento es requerido',
        'gender.required'=>'El campo genero es requerido',
        'phone.required' =>'El campo telefono es requerido',
        'country_id.required' =>'No has introducido tu nacionalidad',
        'province_id.required' =>'El campo provincia es requerido',
        'city_id.required' =>'El campo ciudad es requerido',
        'adress.required' =>'No has introducido tu domicilio',
        'email.required' =>'No podemos crearte una cuenta sin tu email :(',
        'password.required' =>'No podemos crearte una cuenta sin una contraseña',
        'type_account.required' =>'Tambien validamos el backend , intento de "HACKER"',
        'cuit.required_if'  => 'Necesitamos tu CUIT para constatar los pagos',
        'imagen_dni.required_if'=> 'Necesitamos la foto de tu DNI para validarlo',
        'province_id.integer' =>'La provincia ingresada no es valida',
        'city_id.integer' =>'La ciudad ingresada no es valida'
    ];
}
}
