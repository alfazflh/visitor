<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tamu extends Model
{
    protected $table = 'data_tamu';
    protected $guarded = []; // biar semua kolom bisa diisi mass assignment
}
