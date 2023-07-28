<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tickets extends Model
{
    protected $table = "tickets";
    public $timestamps = true;
    protected $guarded = ['id_tickets'];

    public function studio()
    {
        return $this->belongsTo(Studios::class, 'studios_id', 'id_studio');
    }

    public static function isKtpNumberExists($ktpNumber)
    {
        return self::where('no_ktp', $ktpNumber)->exists();
    }
}
