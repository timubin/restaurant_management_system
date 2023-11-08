<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleDatail extends Model
{
    use HasFactory;
    public function sale(){
        return $this->belongsTo(Sale::class);
    }
}
