<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Incident extends Model
{
    use HasFactory;
    protected $table = 'incidents';

    protected $fillable = [
        'asset_id',
        'incident_date',
        'incident_status',
        'incident_description'
    ];
    public $timestamps = false;

}
