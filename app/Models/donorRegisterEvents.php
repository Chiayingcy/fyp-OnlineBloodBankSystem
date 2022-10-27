<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class donorRegisterEvents extends Model
{
    use HasFactory, Sortable;

    protected $primarykey = 'id';

    public $fillable = [
        'event_id',
        'donor_id',
    ];

    public $sortable = ['event_id', 'donor_id'];

    public function event()
    {
        return $this->belongsTo(Events::class, 'event_id', 'id');
    }

    public function donor()
    {
        return $this->belongsTo(User::class, 'donor_id', 'id');
    }
}
