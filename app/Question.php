<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Question extends Model 
{
    protected $fillable = ['question','a','b','c','d','answer','department_id','more_info'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function department()
    {
        return $this->belongsTo('App\Department');
    }
}