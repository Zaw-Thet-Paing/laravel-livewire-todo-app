<div>
    <h1>User - {{ Auth::user()->name }}</h1>
    <button wire:click="logout" class="btn btn-danger">Logout</button>
</div>
