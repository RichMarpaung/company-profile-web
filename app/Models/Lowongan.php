<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lowongan extends Model
{
    /** @use HasFactory<\Database\Factories\LowonganFactory> */
    use HasFactory;
    protected $guarded = ['id'];
    public function pelamars()
    {
        return $this->hasMany(Pelamar::class);
    }
}
