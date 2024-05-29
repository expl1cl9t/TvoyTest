<?php

namespace App\Livewire;

use App\Models\PassedTest;
use Livewire\Component;

class TeacgerDashboard extends Component
{

    public $tests;

    public function mount()
    {
        $role = auth()->user();
        $this->tests = PassedTest::all()->map(function (PassedTest $ptest){
            if($ptest->test->author->id == auth()->user()->id){
                return $ptest;
            }
        });
    }

    public function render()
    {
        return view('livewire.teacger-dashboard');
    }
}
