<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Especialidade extends Model
{
    use HasFactory;
    
	protected $table = 'especialidades';

	protected $casts = [
		'id_subcategoria' => 'int'
	];

	protected $fillable = [
		'id_subcategoria',
		'nombre'
	];

	public function subcategoria()
	{
		return $this->belongsTo(Subcategoria::class, 'id_subcategoria');
	}

	public function categorias_users()
	{
		return $this->hasMany(CategoriasUser::class, 'especialida');
	}

	public function ofertas()
	{
		return $this->hasMany(Oferta::class, 'especialida');
	}
}
