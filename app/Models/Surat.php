<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
public function kategori()
{
    return $this->belongsTo(Kategori::class);
}
protected $guarded = [];
}
