<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class UserExperience extends Model 
{
    protected $fillable = ['user_id','organisation_name','designation','duration_in_years','ctc','reason_for_leaving'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}