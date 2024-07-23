<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    use HasFactory;

    protected $table = 'contract';
    protected $primaryKey = 'contract_id';
    public $timestamps = false; 

    protected $fillable = [
        'contract_vendor',
        'start_date',
        'end_date',
        'contract_doc',
    ];
    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
    ];
    public function vendor()
    {
        return $this->belongsTo(Vendor::class, 'contract_vendor');
    }
}
