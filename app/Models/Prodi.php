<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    use HasFactory;

    protected $table = 'prodi';
    protected $primaryKey = 'id_prodi';
    protected $guarded = ['id_prodi'];

    public function pendaftar()
    {
    return $this->hasMany(Pendaftar::class);
    }

}
