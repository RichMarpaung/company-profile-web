<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portofolio extends Model
{
    /** @use HasFactory<\Database\Factories\PortofolioFactory> */
    use HasFactory;
    protected $guarded = ['id'];
    public function portofolioTeams()
    {
        return $this->hasMany(PortofolioTeam::class);
    }
    public function teams()
    {
        return $this->belongsToMany(Team::class, 'portofolio_teams');
    }
}
