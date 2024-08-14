<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Inventory extends Model
{
    use HasFactory;

    protected $table = 'inventory';
    protected $primaryKey = 'inventory_id';

    // Eğer tablonuzda timestamps (created_at, updated_at) sütunları yoksa, aşağıdaki satırı ekleyin:
    public $timestamps = false;

    protected $fillable = [
        'serial_num',
        'name',
        'attribute',
        'producer',
        'vendor',
        'brand',
        'model',
        'purchase_date',
        'contract_id',
        'warranty_end_date',
        'maintenance_start_date',
        'maintenance_end_date',
        'maintenance_contract_id',
        'accounting_registration_date',
        'product_owner_id',
        'product_organization_id',
        'status',
        'critical_degree',
        'type',
        'sub_type',
    ];

    // İlişkiler

    public function producer()
    {
        return $this->belongsTo(Company::class, 'producer');
    }
    public function vendor()
    {
        return $this->belongsTo(Company::class, 'vendor');
    }
    public function owner()
    {
        return $this->belongsTo(Employee::class, 'product_owner_id');
    }
    public function organization()
    {
        return $this->belongsTo(Organization::class, 'product_organization_id');
    }
    public function contract()
    {
        return $this->belongsTo(Contract::class, 'contract_id');
    }
    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand');
    }

    public function model()
    {
        return $this->belongsTo(ModelM::class, 'model');
    }

    public function type()
    {
        return $this->belongsTo(Type::class, 'type');
    }

    public function sub_type()
    {
        return $this->belongsTo(SubType::class, 'sub_type');
    }
}
