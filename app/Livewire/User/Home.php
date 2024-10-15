<?php

namespace App\Livewire\User;

use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Home extends Component
{

    #[Validate('required|string')]
    public $name;

    public $tasks = [];

    #[Validate('required|string')]
    public $editName = '';
    public $editId;

    public function mount()
    {
        $this->tasks = Task::where('user_id', Auth::user()->id)->get();
    }

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

        Task::create([
            'user_id'=> Auth::user()->id,
            'name'=> $this->name
        ]);

        $this->name = '';

        $this->tasks = Task::where('user_id', Auth::user()->id)->get();

    }

    public function editTask($id)
    {
        $this->editId = $id;
        $this->editName = Task::find($id)->name;

        $this->dispatch('show-edit-modal');
    }

    public function updateTask()
    {
        $task = Task::find($this->editId);
        $task->update(['name'=> $this->editName]);

        $this->reset('editName', 'editId');
        $this->tasks = Task::where('user_id', Auth::user()->id)->get();
        $this->dispatch('close-modal');
    }

    public function deleteTask($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();
        $this->tasks = Task::where('user_id', Auth::user()->id)->get();
    }

    public function render()
    {
        return view('livewire.user.home');
    }
}
