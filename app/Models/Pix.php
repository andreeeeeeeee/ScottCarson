<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pix extends Model
{
    use HasFactory;

    protected $table = 'chaves_pix';

    protected $fillable = [
        'userId',
        'chave',
        'tipo',
    ];
}
