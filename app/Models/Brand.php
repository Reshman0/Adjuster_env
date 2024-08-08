<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    use HasFactory;

    // Modelin bağlı olduğu tablo adı
    protected $table = 'brands';

    // Primary key kolonu (eğer varsayılan olarak 'id' değilse)
    protected $primaryKey = 'brand_id';

    // Otomatik olarak eklenen zaman damgaları (created_at, updated_at) kullanılıyorsa bu özellik true yapılabilir
    public $timestamps = false;

    // Mass assignment için izin verilen alanlar
    protected $fillable = ['name', 'company_id'];

    // İlişkiler
    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function models()
    {
        return $this->hasMany(Model::class, 'brand_id');
    }
    public function inventories()
    {
        return $this->hasMany(Inventory::class, 'brand_id');
    }
}
