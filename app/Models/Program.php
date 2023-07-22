<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;

    protected $table = 'program';
    protected $primaryKey = 'id_program';
    protected $guarded = ['id_program'];

    public function pendaftar()
    {
    return $this->hasMany(Pendaftar::class);
    }

}
