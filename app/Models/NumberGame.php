<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NumberGame extends Model
{
    use HasFactory;
    protected $table = 'numberGame';

    
    protected $fillable = [
        'round_id',
        'winner',
        'number1',
        'number2',
        'number3',
        'number4',
        'number5',
        'number6',
        'number7',
        'number8',
        'number9',
        'created_at',
        'updated_at',
    ];
}
