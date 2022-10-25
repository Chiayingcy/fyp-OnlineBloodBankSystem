<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\ColumnSortable\Sortable;

class BloodRequest extends Model
{
    use HasFactory, SoftDeletes, Sortable;

    protected $primarykey = 'id';

    public $fillable = [
        'hospitalID',
        'bloodType',
        'bloodQuantity',
        'bloodRequestStatus',
        'bloodRequirement',
        'reason',
        'id'
    ];

    public $sortable = ['id', 'hospitalID', 'bloodType', 'bloodQuantity', 'bloodRequestStatus', 'bloodRequirement', 'reason'];

    public function hospital()
    {
        return $this->belongsTo(Hospitals::class, 'hospitalID', 'id');
    }

    public function bloodTypes()
    {
        return $this->belongsTo(BloodType::class, 'bloodType', 'id');
    }
}
