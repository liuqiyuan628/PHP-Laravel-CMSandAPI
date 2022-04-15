<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    // public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'url',
        'content',
        'slug',
        'image',
        'type_id',
        'user_id',
    ];

    public function type()
    {
        return $this->belongsTo(Type::class, 'type_id');
    }

    
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
