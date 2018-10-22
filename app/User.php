<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use DateTime;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'department_id', 'department_id', 'name', 'password', 'last_name', 'email', 'role', 'profile_photo', 'gender','file', 'age', 'dob', 'address', 'city', 'state', 'country', 'time_zone', 'phone', 'pincode', 'mobile', 'active', 'post_applied', 'reference', 'department', 'notice_period', 'nationality', 'blood_group', 'expected_ctc', 'current_ctc', 'res_address', 'per_address', 'marital_status', 'admin_review', 'admin_per','team_lead_review','team_lead_per'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function department()
    {
        return $this->belongsTo('App\Department');
    }

    public function experiences()
    {
        return $this->hasMany('App\UserExperience');
    }

    public function qualifications()
    {
        return $this->hasMany('App\UserQualification');
    }

    public function references()
    {
        return $this->hasMany('App\UserReference');
    }

    public function tests()
    {
        return $this->hasMany('App\Test');
    }

    public function setDobAttribute( $value ) {
      $this->attributes['dob'] = DateTime::createFromFormat('d/m/Y', $value)->format('Y/m/d');
    }
    public function setFileAttribute($file) {
        $source_path = upload_tmp_path($file);
        if ($file && file_exists($source_path)) 
        {
            upload_move($file,'interviewer');
            @unlink($source_path);
            $this->deleteFile();
        }
        $this->attributes['file'] = $file;
        if ($file == '') 
        {
            $this->deleteFile();
            $this->attributes['file'] = "";
        }
    }
    public function file_url($type='original') 
    {
        if (!empty($this->file))
            return upload_url($this->file,'interviewer',$type);
        elseif (!empty($this->file) && file_exists(tmp_path($this->file)))
            return tmp_url($this->$file);
        else
            return asset('images/default-interviewer.jpg');
    }
    public function deleteFile() 
    {
        upload_delete($this->file,'interviewer',array('original','thumb','medium'));
    }

    /**
     * Scope a query to only include active users.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public static function progress($user)
    {
        $personal = $user->last_name != '' ? 40 : 0;
        $experience = count($user->experiences) > 0 ? 20 : 0;
        $qualification = count($user->qualifications) > 0 ? 20 : 0;
        $reference = count($user->references) > 0 ? 20 : 0;
        $profile = $personal + $experience + $qualification + $reference;
        $admin_per = $user->admin_per;
        $team_lead_per = $user->team_lead_per;
        $total = Test::where('user_id','=',$user->id)->count();
        $attempt = Test::where('user_id','=',$user->id)->where('correct', true)->count();
        $result = $attempt > 0 ? ( $attempt  * 100) / $total : 0;
        //$progress = ($result + $profile + $admin_per + $team_lead_per) / 4;
        return $result;
    }

}
