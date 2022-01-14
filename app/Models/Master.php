<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Master extends Model
{
    use HasFactory;
    protected $table = 'masters';

    protected $fillable=[
        'master_key',
        'master_value',
        'created_at',
    ];

}
