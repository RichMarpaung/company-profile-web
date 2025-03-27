<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    /** @use HasFactory<\Database\Factories\TaskFactory> */
    use HasFactory;
    protected $guarded = ['id'];
    public function team()
    {
        return $this->belongsTo(Team::class);
    }
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
    public function teams()
    {
        return $this->belongsToMany(Team::class, 'task_teams');
    }
}
