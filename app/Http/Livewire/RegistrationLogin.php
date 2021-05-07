<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Hash;
use App\Models\User;

class RegistrationLogin extends Component
{
    public $users, $email, $password, $name;
    public $registerForm = false;

    public function render()
    {
        return view('livewire.registration-login');
    }

    private function resetInputFields(){
        $this->name = '';
        $this->email = '';
        $this->password = '';
    }

    public function login()
    {
        $validatedDate = $this->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if(\Auth::attempt(array('email' => $this->email,'password' => $this->password ))){
             session()->flash('message', "Ha iniciado sesión correctamente.");

        }else if(\Auth::attempt(array('email' => $this->email))){
            session()->flash('error', 'El correo electrónico es incorrectos.');

        }else if(\Auth::attempt(array('password' => $this->password))){
            session()->flash('error', 'La password es incorrecta.');

        }else{
            session()->flash('error', 'El correo electrónico y la contraseña son incorrectos.');
        }


    }

    public function register()
    {
        $this->registerForm = !$this->registerForm;
    }

    public function registerStore()
    {
        $v = $this->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $this->password = Hash::make($this->password);

        $data = [ 'name' => $this->name,
                  'email' => $this->email,
                  'password' => $this->password
                ];

        User::create($data);

        session()->flash('message', 'Te has registrado con éxito.');

        $this->resetInputFields();

    }
}
