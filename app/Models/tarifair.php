<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tarifair extends Model
{
    use HasFactory;

    protected $table='tarifairs';
    protected $fillable = ['kelompok_pelanggan','hargapemakaian','biayapemeliharaan','biayaadministrasi'];

}
