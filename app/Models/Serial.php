<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Serial extends Model
{
    use HasFactory, Uuid;

    public $incrementing = false;

    protected $guarded = [];

    public static $rules = [
        'id_proses'     => 'required',
        'kode_buku'     => 'required',
        'kode_aplikasi' => 'required',
        'serial'        => 'required',
        'active'        => 'required',
        'active_token'  => 'required',
        'jumlah_serial' => 'required|numeric|min:1'
    ];

    public static $ruleMessages = [
        'kode_buku'     => 'book',
        'kode_aplikasi' => 'app',
    ];

    public function book()
    {
        return $this->belongsTo(Book::class, 'kode_buku');
    }

    public function app()
    {
        return $this->belongsTo(App::class, 'kode_aplikasi');
    }
}
