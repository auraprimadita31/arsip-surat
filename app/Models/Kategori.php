<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
public function surats()
{
    return $this->hasMany(Surat::class);
}
protected $guarded = [];
}
