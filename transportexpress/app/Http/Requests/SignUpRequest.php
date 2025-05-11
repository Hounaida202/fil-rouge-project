<?php
namespace app\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class SignupRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function messages()
{
    return [
        'email.unique' => 'Cet email est déjà utilisé.', 
        'password.confirmed' => 'Les mots de passe ne correspondent pas.',
    ];
}

    public function rules(): array
    {
        return [
        'name' => ['required', 'string', 'max:255'],
        // 'prenom' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'tel' => ['required', 'max:255'],
        'ville' => ['required', 'max:255'],
        'password' => ['required', 'string', 'min:8', 'confirmed'],
        'role' => ['required'],
        ];
    }
}