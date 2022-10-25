<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;

class BloodType extends Model
{
    use HasFactory;

    protected $fillable = [
        'bloodType',
    ];

    public function User()
    {
        return $this->belongsToMany(User::class, 'foreign_key', 'id');
    }

    
}
