<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Mockery\Generator\StringManipulation\Pass\Pass;

class Test extends Model
{
    use HasFactory;

    public function subject(){
        return $this->belongsTo(Subject::class);
    }
    public function author()
    {
        return $this->belongsTo(User::class, 'Author');
    }
    public function passedTests()
    {
        return $this->hasMany(PassedTest::class);
    }
}
