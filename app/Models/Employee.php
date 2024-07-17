<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $table = 'employees'; // Tablo adını belirtin

    protected $primaryKey = 'employee_id'; // Birincil anahtar sütununu belirtin
    public $timestamps = false; // Eğer tabloda timestamps sütunları yoksa
    protected $fillable = [
        'name',
        'surname',
        'sicil',
        'organization_unit',
        'phone_num',
        'e_mail',
        'duty',
    ];


}
