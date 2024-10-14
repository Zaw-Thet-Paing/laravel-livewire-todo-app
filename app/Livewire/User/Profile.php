<?php

namespace App\Livewire\User;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Profile extends Component
{

    public function logout()
    {
        Auth::logout();

        // Force full redirect after successful login
        return redirect()->intended(route('login'));

        // $this->redirect(route('login'), navigate:true);
    }

    public function render()
    {
        return view('livewire.user.profile');
    }
}
