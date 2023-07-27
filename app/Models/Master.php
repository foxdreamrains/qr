<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Master extends Model
{
    protected $table = "master";
    public $timestamps = true;
    protected $guarded = ['id_master'];
}
