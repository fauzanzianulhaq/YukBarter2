<?php

namespace App\Models;
use App\Models\Upload;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable = ['post_id', 'user_id', 'reason', 'additional_info'];
    public function barang()
{
    return $this->belongsTo(Upload::class, 'post_id'); // 'post_id' mengacu pada kolom di tabel 'reports'
}

    // Relasi dengan model User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

