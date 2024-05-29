<?php

namespace App\Livewire;

use App\Models\Group;
use App\Models\PassedTest;
use App\Models\Test;
use App\Models\Subject;
use App\Models\User;
use Livewire\Component;

class TeacherProfile extends Component
{

    public $totalTests;

    public $subjects;

    public $stats;
    public $deepSubjects;
    public $avg;

    public $testBySubjectAndUserFiltred;

    public function mount()
    {
        $this->totalTests = auth()->user()->createdTests()->count();
        $this->subjects = auth()->user()->createdTests()->pluck('subject_id')->unique();
        $this->deepSubjects = auth()->user()->createdTests()->get();
        $testBySubjectAndUser = Subject::all()->whereIn('id',$this->subjects);
        $this->avg = PassedTest::all()->avg('TimeSpent');
        $this->testBySubjectAndUserFiltred = $testBySubjectAndUser->map(function (Subject $subj){
            $subj->tests->map(function (Test $test){
                if($test->author->id == auth()->user()->id){
                    return $test;
                }
            });
            return $subj;
        });
        $count = 0;
        $this->stats = Group::all()->map(function (Group $group) use ($count) {
            return collect([
                "groupInfo" => $group,
                'passedTests' => $group->avaliableTests->map(function (Test $test) use ($count, $group) {
                    if($test->author->id == auth()->user()->id){
                        return collect([
                            "testInfo" => $test,
                            'avgGrade' => $test->passedTests->map(function (PassedTest $ptest) use ($group) {
                                if($ptest->user->group->id == $group->id){
                                    return $ptest;
                                }
                            })->avg('Grade'),
                            'avgPasstime' => $test->passedTests->map(function (PassedTest $ptest) use ($group) {
                                if($ptest->user->group->id == $group->id){
                                    return $ptest;
                                }
                            })->avg('TimeSpent'),
                            'totalPasses' => $test->passedTests->map(function (PassedTest $ptest) use ($group) {
                                if($ptest->user->group->id == $group->id){
                                    return $ptest;
                                }
                            }),
                        ]);
                    }
                })
            ]);
        });
    }
    public function render()
    {
        return view('livewire.teacher-profile');
    }
}
