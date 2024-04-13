<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'location',
        'no_of_users',
        'no_of_cleanups',
        'user_id',
        'clan-up_id',
        'image_id',
    ];

    public function cleanups()
{
    return $this->hasMany(CleanUp::class);
}

public function users()
{
    return $this->belongsToMany(User::class);
}

}