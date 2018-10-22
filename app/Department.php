<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Department extends Model 
{
    use Sluggable;
    public function sluggable()
    {
        return [
        'slug' => [
        'source' => 'name',
        'onUpdate' => true
        ]
        ];
    }
    protected $fillable = ['name','slug'];

    public function users()
    {
        return $this->hasMany('App\User');
    }

    public function teamlead()
    {
        return $this->hasOne('App\User')->where('role','employee');
    }

    public function questions()
    {
        return $this->hasMany('App\Question');
    }
}