<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\Validate;

class Register extends Component
{

    #[Validate('required|string')]
    public $name = '';

    #[Validate('required|email|unique:users')]
    public $email = '';

    #[Validate('required|min:8')]
    public $password = '';

    public function save()
    {
        $this->validate();

        $user = new User();
        $user->name = $this->name;
        $user->email = $this->email;
        $user->password = $this->password;
        $user->save();

        Auth::login($user);

        // $this->redirect(route('user.home'), navigate:true);
        // // Force full redirect after successful login
        return redirect()->intended(route('user.home'));

    }

    public function render()
    {
        return view('livewire.auth.register');
    }
}
