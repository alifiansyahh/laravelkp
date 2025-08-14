<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    use HasFactory;

   

  protected $fillable = ['nama', 'npm','prodi','hp','perusahaan', 'alamat','tanggal_pengajuan'];

  // Relasi dengan user
public function user()
{
    return $this->belongsTo(User::class);
}

}

