<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Build;

class Favorite extends Model
{
    public function build()
    {
        return $this->belongsTo(Build::class);
    }
}
