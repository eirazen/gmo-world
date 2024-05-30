<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Choice extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'question_id',
        'answer'
    ];

    public function question()
    {
        return $this->belongsTo('App\Models\Question');
    }
}
