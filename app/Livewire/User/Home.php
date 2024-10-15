<?php

namespace App\Livewire\User;

use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Home extends Component
{
    public $name;

    public $tasks = [];

    public $editName = '';

    public $editId;
    public $deleteId;

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
        $this->validate([
            'name'=> 'required|string'
        ]);

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

        $this->validate([
            'editName'=> 'required|string'
        ]);

        $task = Task::find($this->editId);
        $task->update(['name'=> $this->editName]);

        $this->reset('editName', 'editId');
        $this->tasks = Task::where('user_id', Auth::user()->id)->get();
        $this->dispatch('hide-edit-modal');
    }

    public function deleteModal($id)
    {
        $this->deleteId = $id;

        $this->dispatch('show-delete-modal');
    }

    public function deleteTask()
    {
        $task = Task::findOrFail($this->deleteId);
        $task->delete();
        $this->tasks = Task::where('user_id', Auth::user()->id)->get();

        $this->dispatch('hide-delete-modal');
    }

    public function render()
    {
        return view('livewire.user.home');
    }
}
