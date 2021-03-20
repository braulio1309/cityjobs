<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfertaCandidato extends Model
{
    use HasFactory;
    
	protected $table = 'oferta_candidatos';

	protected $casts = [
		'id_oferta' => 'int',
		'candidato' => 'int',
		'precio_hora' => 'float'
	];

	protected $dates = [
        'fecha_dia',
		'hora_inicio',
		'hora_fin'
	];

	protected $fillable = [
		'id_oferta',
        'candidato',
        'fecha_dia',
		'precio_hora',
		'hora_inicio',
		'hora_fin'
	];

	public function user()
	{
		return $this->belongsTo(User::class, 'candidato');
	}

	public function oferta()
	{
		return $this->belongsTo(Oferta::class, 'id_oferta');
	}
}
