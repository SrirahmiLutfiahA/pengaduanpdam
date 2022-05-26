<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class teknisi extends Model
{
    use HasFactory;
    
    protected $table='teknisi';
    protected $primaryKey = 'id_teknisi';
    protected $fillable = ['nama','status_bekerja'];

    public $timestamps = false;

}
