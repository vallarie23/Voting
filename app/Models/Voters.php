<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voters extends Model
{
    use HasFactory;

    protected $fillable = [ 'name', 'id', 'regNo', 'gender','phone','school_id','year-of_study'];
}
