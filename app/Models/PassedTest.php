<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PassedTest extends Model
{
    use HasFactory;

    public function test()
    {
        return $this->belongsTo(Test::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
