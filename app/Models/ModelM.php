<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelM extends Model
{
    use HasFactory;
    // Tablonun adı
    protected $table = 'models';

    // Birincil anahtar kolonu
    protected $primaryKey = 'model_id';

    // Doldurulabilir alanlar
    protected $fillable = [
        'brand_id',
        'name',
    ];

    // Timestamps kullanmamak için
    public $timestamps = false;

    // Brand ile ilişki tanımlama (Bir model bir branda ait)
    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }
}
