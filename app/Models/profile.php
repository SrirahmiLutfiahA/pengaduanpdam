<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class profile extends Model
{
    use HasFactory;

    protected $table='profiles';
    protected $fillable = ['username','password','email','level'];

    public function pelanggans()
    {
        return $this->hasOne(pelanggan::class, 'profile_id', 'id');
    }

}
