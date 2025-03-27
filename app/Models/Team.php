<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    /** @use HasFactory<\Database\Factories\TeamFactory> */
    use HasFactory;
    protected $guarded = ['id'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function tasks()
    {
        return $this->belongsToMany(Task::class, 'task_teams');
    }
    public function portofolios()
    {
        return $this->belongsToMany(Portofolio::class, 'portofolio_teams');
    }

}
