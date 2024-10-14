<div>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h1 class="text-center">Login Page</h1>
                    </div>
                    <div class="card-body">
                        <form wire:submit.prevent="user_login">
                            <div class="mb-3">
                                <label for="">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" wire:model="email">
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">Password</label>
                                <div x-data="{ showPassword: false }">
                                    <div class="input-group">
                                        <input :type="showPassword ? 'text' : 'password'" class="form-control @error('password') is-invalid @enderror" wire:model="password">
                                        <span class="input-group-text" @click="showPassword = !showPassword">
                                            <i :class="showPassword ? 'fa-regular fa-eye' : 'fa-regular fa-eye-slash'"></i>
                                        </span>
                                    </div>
                                </div>
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-success w-100">
                                    Login
                                    <div wire:loading class="spinner-border spinner-border-sm" role="status">
                                    </div>
                                </button>
                            </div>
                            <div class="text-center">
                                <a href="{{ route('register') }}" wire:navigate>Register</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
</div>
