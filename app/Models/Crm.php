<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Crm extends Model
{
    use HasFactory;
    protected $table = 'crm';
    protected $fillable = [
        'date',
        'person',
        'take',
        'give',
        'remained',
        'message'
    ];
}
