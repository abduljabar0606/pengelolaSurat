<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class letter extends Model
{
    use HasFactory;
    protected $casts = [
        'recipients' => 'array',
    ];
        
    protected $fillable = [
        'letter_type_id',
        'letter_perihal',
        'recipients',
        'content',
        'attechment',
        'notulis',
];

  

    public function letter_type()
    {
        return $this->belongsTo(letter_type::class);
    }
    
    public function result()
    {
        return $this->hasMany(result::class, 'letter_id', 'id');
    }
    
    public function user()
    {
        return $this->belongsTo(User::class, 'notulis', 'id');
    }
}
