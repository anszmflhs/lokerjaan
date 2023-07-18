<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pekerjaan extends Model
{
    use HasFactory;

    protected $fillable  = [
        'user_id',
        'title'
    ];

    public function pelamars()
    {
        return $this->hasMany(Pelamar::class);
    }
}
