<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function projects()
    {
        return $this->hasMany(Project::class, 'client_id');
    }

    public function scopeisActive(Builder $query)
    {
        $query->where('status', 1)->get();
    }
}
