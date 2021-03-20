<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Oferta extends Model
{
    use HasFactory;
	protected $table = 'ofertas';

	protected $casts = [
		'creador' => 'int',
		'categoria' => 'int',
		'subcatego' => 'int',
		'especialida' => 'int',
		'presupuesto_hora' => 'float',
		'estatus' => 'int'
	];

	protected $dates = [
		'fecha_dia',
		'hora_inicio',
		'hora_fin'
	];

	protected $fillable = [
		'creador',
		'titulo',
		'categoria',
		'subcatego',
		'especialida',
		'latitud',
		'longitud',
		'direccion',
		'presupuesto_hora',
		'fecha_dia',
		'hora_inicio',
		'hora_fin',
		'descripcion',
		'estatus'
	];

	public function categoria()
	{
		return $this->belongsTo(Categoria::class, 'categoria');
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'creador');
	}

	public function especialidade()
	{
		return $this->belongsTo(Especialidade::class, 'especialida');
	}

	public function subcategoria()
	{
		return $this->belongsTo(Subcategoria::class, 'subcatego');
	}

	public function oferta_candidatos()
	{
		return $this->hasMany(OfertaCandidato::class, 'id_oferta');
	}

	public function oferta_favoritas()
	{
		return $this->hasMany(OfertaFavorita::class, 'id_oferta');
	}
}
