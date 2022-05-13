<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pengaduan extends Model
{
    use HasFactory;

    protected $table='pengaduans';
    protected $fillable = ['pelanggan_id','kategori_id','keterangan','fotoaduan','balasanadmin','tanggalselesai','fotosebelum','fotoproses','fotoselesai'];


    public function pelanggans()
    {
        return $this->belongsTo(pelanggan::class, 'pelanggan_id', 'id');
    }

    public function kategoris()
    {
        return $this->belongsTo(kategori::class, 'kategori_id', 'id');
    }
}
