<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelamar extends Model
{
    /** @use HasFactory<\Database\Factories\PelamarFactory> */
    use HasFactory;
    protected $guarded = ['id'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function lowongan()
    {
        return $this->belongsTo(Lowongan::class);
    }
}
