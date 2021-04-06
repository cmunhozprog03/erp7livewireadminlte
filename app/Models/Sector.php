<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    protected $fillable = ['company_id', 'name', 'description', 'active', 'position', 'image', 'slug'];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
