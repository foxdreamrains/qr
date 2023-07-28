<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cabang extends Model
{
    use HasFactory;
    protected $table = 'cabangs';
    protected $guarded = [];

    public function studio()
    {
        return $this->hasMany(Studios::class, 'cabangs_id', 'id');
    }
}
