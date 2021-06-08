<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Urls extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_user',
        'nova_url',
        'antiga_url',
        'validade'
    ];

    public function user()
    {
        return $this->hasOne(User::class , 'id');
    }
}
