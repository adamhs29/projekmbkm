<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{

    protected $table = 'roles';
    protected $primaryKey = 'id_role';
    protected $guarded = ['id_role'];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    use HasFactory;
}
