<?php

namespace App\Livewire\User;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Home extends Component
{

    #[Validate('required|string')]
    public $name = '';

    public function logout()
    {
        Auth::logout();

        // Force full redirect after successful login
        return redirect()->intended(route('login'));

        // $this->redirect(route('login'), navigate:true);
    }

    public function save()
    {
        $this->validate();



    }

    public function render()
    {
        return view('livewire.user.home');
    }
}
