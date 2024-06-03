<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kamar extends Model
{
    protected $table = 'kamar';
    protected $fillable = [
        'id_kamar',
        'tipe',
        'harga'
    ];
    use HasFactory;
    public $timestamps=false;
}
