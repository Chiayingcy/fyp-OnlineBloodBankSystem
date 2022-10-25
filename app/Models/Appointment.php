<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use Kyslik\ColumnSortable\Sortable;

class Appointment extends Model
{
    use HasFactory, Sortable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'appointmentDate',
        'appointmentTime',
        'appointmentStatus',
        'userID',
        'hospitalId',
        'reason',
    ];

    public $sortable = ['appointmentDate','appointmentTime'];

    public function appointment()
    {
        return $this->belongsTo(User::class, 'id', 'userID');
    }

    public function donor()
    {
        return $this->belongsTo(User::class, 'userID', 'id');
    }

    public function hospital()
    {
        return $this->belongsTo(Hospitals::class, 'hospitalID', 'id');
    }
}
