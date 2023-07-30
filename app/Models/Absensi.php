<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;
    protected $tbale = 'absensis';
    protected $guarded = [];

    public function ticket()
    {
        return $this->belongsTo(Tickets::class, 'tickets_id', 'id_tickets');
    }

    public function studio()
    {
        return $this->belongsTo(Studios::class, 'studios_id', 'id_studio');
    }

    public function cabang()
    {
        return $this->belongsTo(Cabang::class, 'cabangs_id', 'id');
    }
}
