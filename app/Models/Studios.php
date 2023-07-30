<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Studios extends Model
{
    use HasFactory;
    protected $table = 'studios';
    protected $guarded = [];

    public function ticket()
    {
        return $this->hasMany(Tickets::class, 'studios_id', 'id_studio');
    }

    public function cabang()
    {
        return $this->belongsTo(Cabang::class, 'cabangs_id', 'id');
    }

    public function absensi()
    {
        return $this->hasMany(Absensi::class, 'studios_id', 'id_studio');
    }
}
