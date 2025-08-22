<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContatoRafael extends Model
{
    use HasFactory;
    protected $table = 'contato_rafaels';

    protected $fillable = [
        'nome', 'telefone', 'email'
    ];

}
