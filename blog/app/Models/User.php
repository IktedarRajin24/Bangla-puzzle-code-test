<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user extends Model
{
 
    use HasFactory;
    public $timestamps = false;

    public function blogs()
    {
        return $this->hasMany(blogs::class);
    }
}
