<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class result extends Model
{
    use HasFactory;

    public function letterResult()
    {
        return $this->belongsTo(letter::class, 'letter_id', 'id');
    }
}
