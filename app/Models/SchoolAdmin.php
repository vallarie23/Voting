<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Schools;

class SchoolAdmin extends Model
{
    use HasFactory;

    protected $fillable = [ 'id', 'name', 'school_id' ];

    public function school()
    {
    	return $this->belongsTo(Schools::class);
    }
}
