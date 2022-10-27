<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\BloodType;

class userTest extends Model
{
    use HasFactory;

    protected $guard = 'users';

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

    public function bloodType()
    {
        return $this->belongsTo(BloodType::class, 'id');
    }
}