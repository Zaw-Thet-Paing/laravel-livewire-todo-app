<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Login extends Component
{

    #[Validate('required|string')]
    public $email = '';

    #[Validate('required|string')]
    public $password = '';

    // public $showPassword = false;

    // public function togglePassword()
    // {
    //     $this->showPassword = !$this->showPassword;
    // }

    public function user_login()
    {
        $this->validate();

        if(!Auth::attempt(['email'=> $this->email, 'password'=> $this->password])){
            $this->addError('email', 'The provided credentials do not match our records');
        }else{
            $this->redirect(route('user.home'), navigate:true);
        }
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}
