<div x-data="{ showPassword: false }">
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h1 class="text-center">Register Page</h1>
                    </div>
                    <div class="card-body">
                        <form wire:submit="save">
                            <div class="mb-3">
                                <label for="">Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" wire:model="name">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" wire:model="email">
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">Password</label>
                                <div class="input-group">
                                    <input :type="showPassword ? 'text' : 'password'" class="form-control @error('password') is-invalid @enderror" wire:model="password">
                                    <span class="input-group-text" @click="showPassword = !showPassword">
                                        <i :class="showPassword ? 'fa-regular fa-eye' : 'fa-regular fa-eye-slash'"></i>
                                    </span>
                                </div>
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-success w-100">
                                    Register
                                    <div wire:loading class="spinner-border spinner-border-sm" role="status">
                                    </div>
                                </button>
                            </div>
                            <div class="text-center">
                                <a href="{{ route('login') }}" wire:navigate>Login</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
</div>
