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
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" wire:model="name" placeholder="Enter your task name...">
                        <button type="submit" class="btn btn-success" style="width: 80px">
                            Save
                            <div class="spinner-border spinner-border-sm" wire:loading wire:target="save" role="status">
                            </div>
                        </button>
                    </div>
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </form>
                <div>
                    @if (count($tasks) === 0)
                    <div class="text-center">
                        There is no tasks
                    </div>
                    @endif
                    @foreach ($tasks as $task)
                        <div class="border border-dark-subtle px-3 py-2 rounded mb-2 d-flex justify-content-between">
                            <div class="d-flex">
                                <input
                                    type="checkbox"
                                    class="form-check-input me-2"
                                    {{ $task->status ? 'checked' : '' }}
                                    wire:click="toggleTaskComplete({{ $task->id }})"
                                />
                                <span class="{{ $task->status ? 'text-decoration-line-through' : '' }}">{{ $task->name }}</span>
                            </div>
                            <div>
                                <span class="me-2" wire:click="editTask({{ $task->id }})" style="cursor: pointer" >
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </span>

                                <!-- Edit Modal -->
                                <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Task</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form class="mb-3" wire:submit.prevent="updateTask">
                                                <div class="input-group">
                                                    <input type="text" value="{{ $editName }}" name="name" class="form-control @error('name') is-invalid @enderror" wire:model="editName" placeholder="Enter your task name...">
                                                    <button type="submit" class="btn btn-success" style="width: 100px">
                                                        Update
                                                        <div class="spinner-border spinner-border-sm" wire:loading wire:target="updateTask" role="status">
                                                        </div>
                                                    </button>
                                                </div>
                                                @error('name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </form>
                                        </div>
                                        {{-- <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-success">Update</button>
                                        </div> --}}
                                    </div>
                                    </div>
                                </div>

                                <span style="cursor: pointer" wire:click="deleteModal({{ $task->id }})">
                                {{-- <span style="cursor: pointer" data-bs-toggle="modal" data-bs-target="#deleteModal"> --}}
                                    <i class="fa-solid fa-trash"></i>
                                </span>

                                <!-- Delete Modal -->
                                <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-sm">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Are you sure?</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body d-flex justify-content-end">
                                                <button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal">No</button>
                                                <button type="button" class="btn btn-danger" wire:click="deleteTask">
                                                    Yes
                                                    <div class="spinner-border spinner-border-sm" wire:loading wire:target="deleteTask" role="status">
                                                    </div>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
</div>

<script>
    window.addEventListener('show-edit-modal', event => {
        var modal = new bootstrap.Modal(document.getElementById('editModal'));
        modal.show();
    });

    window.addEventListener('hide-edit-modal', event => {
        var modal = document.getElementById('editModal');
        var modalInstance = bootstrap.Modal.getInstance(modal);
        modalInstance.hide();
    });

    window.addEventListener('show-delete-modal', event => {
        var modal = new bootstrap.Modal(document.getElementById('deleteModal'));
        modal.show();
    });

    window.addEventListener('hide-delete-modal', event => {
        var modal = document.getElementById('deleteModal');
        var modalInstance = bootstrap.Modal.getInstance(modal);
        modalInstance.hide();
    });
</script>
