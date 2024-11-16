<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{
    use HasFactory;
    protected $table = 'barang';
    protected $fillable = ['kategori_id','nama_barang', 'nomor_wa', 'deskripsi', 'foto', 'status'];
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }
    public function user()
{
    return $this->belongsTo(User::class, 'user_id');
}
}
