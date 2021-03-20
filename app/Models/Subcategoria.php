<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategoria extends Model
{
    use HasFactory;
    
	protected $table = 'subcategorias';

	protected $casts = [
		'id_categoria' => 'int'
	];

	protected $fillable = [
		'id_categoria',
		'nombre'
	];

	public function categoria()
	{
		return $this->belongsTo(Categoria::class, 'id_categoria');
	}

	public function categorias_users()
	{
		return $this->hasMany(CategoriasUser::class, 'subcatego');
	}

	public function especialidades()
	{
		return $this->hasMany(Especialidade::class, 'id_subcategoria');
	}

	public function ofertas()
	{
		return $this->hasMany(Oferta::class, 'subcatego');
	}
}
