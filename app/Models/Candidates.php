<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Voters;
use App\Models\Positions;

class Candidates extends Model
{
    use HasFactory;
    protected $fillable = [ 'id', 'voter_id', 'position_id' ];

    public function voter()
    {
    	return $this->belongsTo(Voters::class);
    }

        public function position()
    {
    	return $this->belongsTo(Positions::class);
    }
}
