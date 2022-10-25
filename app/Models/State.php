<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;

class State extends Model
{
    use HasFactory;

    protected $primaryKey = 'stateID';

    protected $fillable = [
        'stateCode',
        'stateName',
    ];

    public function States()
    {
        return $this->hasMany(User::class, 'stateID', 'stateID');
    }

}
