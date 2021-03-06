<div>
    <form method="POST" wire:submit.prevent="add">
        @csrf
        <div class="form-row row-eq-spacing-sm">
            <div class="col-sm">
                <label for="user-select">User</label>
                <select class="form-control" id="user-select" multiple="multiple" wire:model="usersToAdd" size="3">
                    @foreach($users as $user)
                        <option value="{{ $user->user->id }}">{{ $user->user->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-dark">Add</button>
        </div>
    </form>
</div>
