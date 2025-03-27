<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PortofolioTeam extends Model
{
    /** @use HasFactory<\Database\Factories\PortofolioTeamFactory> */
    use HasFactory;
    protected $guarded = ['id'];
    public function portofolio()
    {
        return $this->belongsTo(Portofolio::class);
    }
    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}
