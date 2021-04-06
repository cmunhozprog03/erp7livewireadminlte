<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = ['name', 'logo'];

    public function sectors()
    {
        return $this->hasMany(Sector::class);
    }
}
