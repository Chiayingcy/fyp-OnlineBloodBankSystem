<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class donorRegisterEvents extends Model
{
    use HasFactory;

    protected $primarykey = 'id';

    public $fillable = [
        'event_id',
        'donor_id',
    ];
}
