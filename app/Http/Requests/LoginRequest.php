<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Factory as ValidationFactory;

class LoginRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            // se solicitara el email y el password
            'email' => 'required',
            'password' => 'required'
        ];
    }
    public function getCredentials()
    {
        //contiene los valores de la solicitud
        //se esta tratando de obtener
        $name = $this->get('name');

        if($this->isEmail($name)){
            return [
                'email'=>$name,
                'password'=> $this->get('password')
            ];
        }
        return $this->only('name', 'password');
    }
    public function isEmail($value){
        // modulo de validaciones con una libreria
        $factory = $this->container->make(ValidationFactory::class);
        // los valores deben de ser iguales, []arreglos, mi campo name sea igual a un email
        //si falla me debe de retornar como falso
        return !$factory->make(['name'=>$value],['name'=>'email'])->fails();
    }
}
