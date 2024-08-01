<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubType extends Model
{
    use HasFactory;

    // Tablonuzun adı
    protected $table = 'sub_type';

    // Birincil anahtar kolonu
    protected $primaryKey = 'sub_type_id';

    // Hangi kolonların doldurulabilir olduğunu belirtin
    protected $fillable = [
        'upper_type_id',
        'sub_type_name',
        'sub_type_description',
    ];

    // Timestamps kullanmak istemiyorsanız bu satırı ekleyin
    public $timestamps = false;

    // İlişkiler
    public function type()
    {
        return $this->belongsTo(Type::class, 'upper_type_id', 'type_id');
    }
    
    public function upperType()
    {
        return $this->belongsTo(Type::class, 'upper_type_id', 'type_id');
    }

}
