<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HospitalsBloodBankInventory extends Model
{
    use HasFactory;

    protected $fillable = [
        'hospitalID',
        'bloodType',
        'bloodQuantity'
    ];

    public function hospital()
    {
        return $this->belongsTo(Hospitals::class, 'hospitalID', 'id',);
    }

    public function bloodType()
    {
        return $this->belongsTo(BloodType::class, 'bloodType', 'id');
    }

    public function bloodTypes()
    {
        return $this->belongsTo(BloodType::class, 'bloodType', 'id');
    }
}
