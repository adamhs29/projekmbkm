<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftar extends Model
{
    use HasFactory;

    protected $table = 'pendaftar';
    protected $primaryKey = 'id_pendaftar';
    protected $guarded = ['user_id'];

    protected $fillable = ['user_id',
    'nama', 
    'npm',
    'nik',
    'jenis_kelamin',
    'alamat',
    'kecamatan',
    'kabupaten',
    'provinsi',
    'tempat_lahir',
    'tanggal_lahir',
    'no_telp', 
    'fakultas_id',
    'prodi_id', 
    'program_id',
    'foto',
    'skrip_nilai',
    'krs',
    'ipk',
    'semester',
    'nama_ayah',	
    'nama_ibu',	
    'alamat_ortu',
    'no_telp_ortu',	
    'pekerjaan_ayah',	
    'pekerjaan_ibu',
    'angkatan',
    'kode_matkul',
    'nama_matkul',
    'total_sks'
    ];
    

    protected $casts = [
    'kode_matkul' => 'array',
    'nama_matkul' => 'array',
];
    
    public function program()
    {
        return $this->belongsTo(Program::class, 'program_id');
    }

    public function prodi()
    {
        return $this->belongsTo(Prodi::class, 'prodi_id');
    }

    public function fakultas()
    {
        return $this->belongsTo(Fakultas::class, 'fakultas_id');
    }

        public function matkul()
    {
        return $this->belongsToMany(Matkul::class, 'matkul_id');
    }

public function user()
{
    return $this->belongsTo(User::class, 'user_id');
}
        
}
