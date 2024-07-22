<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    protected $table = 'organization';
    protected $primaryKey = 'organization_id';
    public $timestamps = false;
    public function upperOrganization()
{
    return $this->belongsTo(Organization::class, 'upper_organization', 'organization_id');
}

}
