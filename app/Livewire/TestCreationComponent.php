<?php

namespace App\Livewire;

use App\Models\Group;
use App\Models\Subject;
use Livewire\Component;

class TestCreationComponent extends Component
{

    public $Subjects;
    public $Groups;

    public function mount()
    {
        $this->Subjects = Subject::all();
        $this->Groups = Group::where('school_id',auth()->user()->school->id)->get();
    }
    public function render()
    {
        return view('livewire.test-creation-component');
    }
}
