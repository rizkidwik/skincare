<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_user','answer'
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'id_user','id');
    }
}
