<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolAdmin extends Model
{
    use HasFactory;

    protected $fillable = [ 'id', 'name', 'school_id' ];
}
