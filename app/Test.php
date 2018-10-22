<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Test extends Model 
{
    protected $fillable = ['user_id','department_id','question_id','answer','correct'];

    public function users()
    {
        return $this->hasMany('App\User');
    }

    public function departments()
    {
        return $this->hasMany('App\Department');
    }

    public function question()
    {
        return $this->belongsTo('App\Question');
    }
}