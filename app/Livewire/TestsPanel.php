<?php

namespace App\Livewire;

use App\Models\PassedTest;
use App\Models\Subject;
use Livewire\Component;

class TestsPanel extends Component
{

    public $subjectFilter = [];

    public $count;

    public $tests;

    public $title;

    public function mount()
    {
        $this->subjectFilter = Subject::all()->pluck('id');
        $this->tests = auth()->user()->group->avaliableTests()->whereIn('subject_id',$this->subjectFilter)->get();
        $this->title = 'Все доступные тесты';
    }

    public function changeToPassedTests(){
        $this->tests = auth()->user()->passedTests->map(function (PassedTest $test){
            return $test->test;
        });
        $this->title = 'Пройденные тесты';
    }

    public function changeToAvailableTests(){
        $this->tests = auth()->user()->group->avaliableTests()->whereIn('subject_id',$this->subjectFilter)->get();
        $this->title = 'Все доступные тесты';
    }

    public function applyFilters()
    {
        $this->tests = auth()->user()->group->avaliableTests()->whereIn('subject_id',$this->subjectFilter)->get();
        $this->count = count($this->subjectFilter);
    }
}
