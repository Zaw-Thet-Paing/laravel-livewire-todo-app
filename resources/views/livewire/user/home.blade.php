<div>

    <nav class="navbar bg-body-tertiary">
        <div class="container">
            <a href="{{ route('user.home') }}" wire:navigate class="navbar-brand">Todo App</a>

            <div class="d-flex">
                <a href="{{ route('user.profile') }}" wire:navigate class="btn btn-primary me-2">
                    Profile
                </a>
                <button wire:click="logout" class="btn btn-danger">Logout</button>
            </div>
        </div>
    </nav>

    <div class="container mt-3">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <form class="mb-3" wire:submit.prevent="save">
                    <div class="input-group">
                        <input type="text" class="form-control @error('name') is-invalid @enderror" wire:model="name" placeholder="Enter your task name...">
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </form>
                <div>
                    <div class="border border-dark-subtle px-3 py-2 rounded mb-2 d-flex justify-content-between">
                        <div class="d-flex">
                            <input type="checkbox" class="form-check-input me-2">
                            <span>todo 1</span>
                        </div>
                        <div>
                            <span class="me-2" style="cursor: pointer">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </span>
                            <span style="cursor: pointer">
                                <i class="fa-solid fa-trash"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
</div>
