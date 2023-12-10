<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookApp extends Model
{
    use HasFactory, Uuid;

    public $incrementing = false;

    protected $guarded = [];

    public static $rules = [
        'kode_buku'     => 'required',
        'kode_aplikasi' => 'required'
    ];

    public static $ruleMessages = [
        'kode_buku'     => 'book',
        'kode_aplikasi' => 'app'
    ];

    public function book()
    {
        return $this->belongsTo(Book::class, 'kode_buku', 'kode_buku');
    }

    public function app()
    {
        return $this->belongsTo(App::class, 'kode_aplikasi', 'kode_aplikasi');
    }
}
