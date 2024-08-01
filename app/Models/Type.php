<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;
    // Tablonuzun adı
    protected $table = 'type';

    // Birincil anahtar kolonu
    protected $primaryKey = 'type_id';

    // Hangi kolonların doldurulabilir olduğunu belirtin
    protected $fillable = [
        'type_name',
        'type_description',
    ];

    // Timestamps kullanmak istemiyorsanız bu satırı ekleyin
    public $timestamps = false;
    
    public function subTypes()
{
    return $this->hasMany(SubType::class, 'upper_type_id', 'type_id');
}
}
