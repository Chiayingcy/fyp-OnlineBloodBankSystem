<?php

namespace App\Models;

//use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;

use Kyslik\ColumnSortable\Sortable;

use App\Models\BloodType;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, Sortable;

    protected $guard = 'users';

    protected $primarykey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'ic',
        'age',
        'email',
        'bloodType',
        'gender',
        'phoneNo',
        'address',
        'zipCode',
        'stateID',
        'role',
        'password',
    ];

    public $sortable = ['name','ic', 'age', 'email', 'bloodType', 'gender'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function appointments(){
        return $this->hasMany(Appointment::class,'userID','id');
    }
 
    public function state(){
        return $this->belongsTo(State::class,'stateID','stateID');
    }

    public function appointmentsSpecific($status=''){
        $statusValue=0;

        if($status=="pending"){
            $statusValue=0;
        }
        
        elseif ($status=="success"){
            $statusValue=1;
        }
        
        elseif ($status=="fail"){
            $statusValue=2;
        }
        
        else{
            return $this->appointments;
        }
        return $this->appointments->where('appointmentStatus', $statusValue);
    }

    public function appointmentsPending()
    {

        return $this->appointments->where('appointmentStatus', 0);
    }

    public function appointmentsSuccess()
    {

        return $this->appointments->where('appointmentStatus', 1);
    }
    
    public function appointmentsFail()
    {

        return $this->appointments->where('appointmentStatus', 2);
    }

    public function bloodType()
    {
        return $this->belongsTo(BloodType::class, 'id');
    }
}
