<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tickets extends Model
{
    protected $table = "tickets";
    public $timestamps = true;
    protected $guarded = ['id_tickets'];
}
