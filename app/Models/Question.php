<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'level',
        'question',
        'explanation',
        'answer_key'
    ];
    public function choices()
    {
        return $this->hasMany('App\Models\Choice');
    }
}
