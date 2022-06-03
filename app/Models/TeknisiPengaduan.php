<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeknisiPengaduan extends Model
{
    use HasFactory;

    protected $table = "teknisi_pengaduan";
    protected $primaryKey = 'id_teknisi_pengaduan';
}
