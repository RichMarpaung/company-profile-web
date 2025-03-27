<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskTeam extends Model
{
    /** @use HasFactory<\Database\Factories\TaskTeamFactory> */
    use HasFactory;
    protected $guarded = ['id'];
    public function task()
    {
        return $this->belongsTo(Task::class);
    }
    public function team()
    {
        return $this->belongsTo(Team::class);
    }

}
