<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Flight extends Model
{
    use HasFactory;
    protected $table = "flights";
    protected $primaryKey = "flightNumber";
    public $timestamps = false;
    public function setDateAttribute( $value ) {
        $this->attributes['date'] = (new Carbon($value))->format('d/m/y');
      }
    
}
