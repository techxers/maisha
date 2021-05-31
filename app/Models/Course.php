<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function views()
    {
        return $this->hasMany(View::class);
    }
    public function forums()
    {
        return $this->hasMany(Forum::class);
    }
}

