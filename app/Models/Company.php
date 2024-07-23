<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $table = 'companies'; // Tablo adını belirtin
    protected $primaryKey = 'company_id'; // Primary key'i belirtin
    public $timestamps = false; // created_at ve updated_at sütunlarını devre dışı bırakın
    protected $fillable = [
        'name',
        'adress',
        'phone_num',
        'e_mail',
    ];
    
}
