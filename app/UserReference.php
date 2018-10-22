<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class UserReference extends Model 
{
    protected $fillable = ['name', 'designation', 'organisation', 'email', 'contact'];


    public function user()
    {
        return $this->belongsTo('App\User');
    }
}