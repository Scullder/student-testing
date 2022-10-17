<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Test;

class Answer extends Model
{
    use HasFactory;

    protected $fillable = [
        'test_id',
        'fio',
        'email',
        'score'
    ];

    public function test()
    {
      return $this->belongsTo(Test::class);
    }
}
