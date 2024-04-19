<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CleanUp extends Model
{
    use HasFactory;

       /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    // Define the attributes that can be mass assigned
    protected $fillable = [
        'location',
        'time',
        'date',
        'description',
        'group_id',
        'latitude',
        'longitude',
    ];

    // Define the relationship between a cleanup and a group
    // A cleanup belongs to one group
    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    public function users()
{
    return $this->belongsToMany(User::class);
}
}
