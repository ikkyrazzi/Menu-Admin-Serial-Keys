<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory, Uuid;

    public $incrementing = false;

    protected $guarded = [];

    protected $casts = [
        'id' => 'string',
    ];

    public static $rules = [
        'kode_buku'     => 'required|max:50',
        'judul_buku'    => 'required|max:150',
        'kategori'      => 'nullable',
        'penerbit'      => 'required|max:50',
        'keterangan'    => 'nullable'
    ];

    public static $ruleMessages = [
        
    ];

    public function bookApps()
    {
        return $this->hasMany(BookApp::class, 'kode_buku', 'judul_buku');
    }
}
