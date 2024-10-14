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
                <div class="card">
                    <div class="card-header">
                        <h2 class="text-center">User Profile</h2>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <strong>Name : </strong>{{ Auth::user()->name }}
                        </div>
                        <div class="mb-3">
                            <strong>Email : </strong>{{ Auth::user()->email }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>

</div>
