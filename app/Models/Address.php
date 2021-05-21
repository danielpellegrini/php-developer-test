<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    public function users() {
        return $this->belongsToMany(User::class);
    }

    protected $fillable = [
      'street','city','zip','country'
    ];
}
