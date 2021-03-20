<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

	protected $table = 'categorias';

	protected $fillable = [
		'nombre'
	];

	public function users()
	{
		return $this->belongsToMany(User::class, 'categorias_users', 'categoria', 'id_usuario')
					->withPivot('id', 'subcatego', 'especialida')
					->withTimestamps();
	}

	public function ofertas()
	{
		return $this->hasMany(Oferta::class, 'categoria');
	}

	public function subcategorias()
	{
		return $this->hasMany(Subcategoria::class, 'id_categoria');
	}
}
