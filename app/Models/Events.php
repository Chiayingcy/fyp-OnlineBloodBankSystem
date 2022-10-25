<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\ColumnSortable;
use Kyslik\ColumnSortable\Sortable;

class Events extends Model
{
    use HasFactory, SoftDeletes, Sortable;
    
    protected $primarykey = 'id';

    public $fillable = [
        'hospitalID',
        'eventName',
        'eventDate',
        'eventTime',
        'eventDescription',
        'image',
    ];

    public $sortable = ['id' , 'hospitalName','eventName', 'eventDate', 'eventTime', 'eventDescription',];

    public function hospital()
    {
        return $this->belongsTo(Hospitals::class, 'hospitalID', 'id',);
    }
}
