<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Domain extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid', 'names_servers', 'name'
    ];

    protected $cast = [
        'uuid'           => 'string',
        'name'           => 'string',
        'names_servers'  => 'array'   
    ];
}
