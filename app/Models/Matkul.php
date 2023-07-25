<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matkul extends Model
{
    use HasFactory;

    protected $table = 'matkul';
    protected $primaryKey = 'id_matkul';
    protected $guarded = ['id_matkul'];

    public function pendaftar()
    {
    return $this->hasMany(Pendaftar::class);
    }

}
