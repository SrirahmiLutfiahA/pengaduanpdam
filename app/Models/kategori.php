<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kategori extends Model
{
    use HasFactory;

    protected $table='kategoris';
    protected $fillable = ['namakategori'];

    public function pengaduans()
    {
        return $this->hasMany(pengaduan::class, 'kategori_id', 'id');
    }

}
