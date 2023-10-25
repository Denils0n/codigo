<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Empresa extends Model
{
    use HasFactory;


    protected $fillable = [

        'nome',
        'cnpj',
        'user_id',


    ];


    public function dono(): BelongsTo
    {

        return $this->belongsTo(User::class, 'user_id');

    }


}
