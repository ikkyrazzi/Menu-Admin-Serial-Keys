<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class App extends Model
{
    use HasFactory, Uuid;

    public $incrementing = false;

    protected $guarded = [];

    public static $rules = [
        'kode_aplikasi' => 'required|max:50',
        'nama_aplikasi' => 'required|max:150',
        'keterangan'    => 'nullable'
    ];

    public static $ruleMessages = [
        
    ];

    public function bookApps()
    {
        return $this->hasMany(BookApp::class, 'kode_aplikasi', 'nama_aplikasi');
    }
}
