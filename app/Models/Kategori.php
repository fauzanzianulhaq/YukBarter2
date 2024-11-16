<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $table = 'kategori';
    public function barangs()
    {
        return $this->hasMany(Upload::class, 'kategori_id');
    }
    
}
