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
            // dd("user login");
            // session()->flash('livewire:redirect', route('user.home'));
            $this->redirect(route('user.home'), navigate:true);

            // // Force full redirect after successful login
            // return redirect()->intended(route('user.home'));
        }
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}
