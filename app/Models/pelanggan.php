<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class pelanggan extends Model
{
    use HasFactory, SoftDeletes;

    protected $table='pelanggans';
    protected $fillable = ['profile_id','namalengkap','telp','alamat','nosambungan','buktipembayaran'];


    public function pengaduans()
    {
        return $this->hasMany(pengaduan::class, 'pelanggan_id', 'id');
    }
    public function profiles()
    {
        return $this->belongsTo(profile::class, 'profile_id', 'id');
    }

}
