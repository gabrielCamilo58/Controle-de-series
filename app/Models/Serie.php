<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Serie extends Model
{
//nos models ficam todas as regras de negocio, relacionamentos entre as classes e acesso as migrations

    protected $fillable = ['nome', 'capa'];
    use HasFactory;

    public function getCapaUrlAttribute()
    {
        
        if($this->capa) return Storage::url($this->capa);

        return Storage::url('serie/sem-imagem.jpg');

    }
    public function temporadas()
    {
        return $this->hasMany(Temporada::class);
    }

}
