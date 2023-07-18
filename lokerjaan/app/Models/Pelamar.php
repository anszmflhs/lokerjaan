<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelamar extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'alamat',
        'ttl',
        'pekerjaan_id',
        'user_id',
        'pass_foto',
        'cv',
    ];

    public function pekerjaans()
    {
        return $this->belongsTo(Pekerjaan::class,'pekerjaan_id');
    }
    public function users()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
