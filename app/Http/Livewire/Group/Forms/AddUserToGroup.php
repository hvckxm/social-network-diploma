<?php

namespace App\Http\Livewire\Group\Forms;

use App\Models\Group;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class AddUserToGroup extends Component
{
    public Group $group;
    public Collection $users;

    public $usersToAdd;

    public function render(): Factory|View|Application
    {
        return view('livewire.group.forms.add-user-to-group');
    }

    public function mount(): void
    {
        $this->users = User::notInGroup($this->group->id);
    }

    public function add()
    {
        foreach ($this->usersToAdd as $user) {
            User::find($user)->information->update(['group_id' => $this->group->id]);
        }

        return $this->redirectRoute('groups.edit', $this->group->id);
    }
}
