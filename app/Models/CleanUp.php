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
    protected $fillable = [
        'location',
        'time',
        'date',
        'description',
        'group_id',
        'image_id'
    ];

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    public function users()
{
    return $this->belongsToMany(User::class);
}
}
