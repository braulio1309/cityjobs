<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfertaFavorita extends Model
{
    use HasFactory;
    
	protected $table = 'oferta_favoritas';

	protected $casts = [
		'id_oferta' => 'int',
		'id_usuario' => 'int'
	];

	protected $fillable = [
		'id_oferta',
		'id_usuario'
	];

	public function oferta()
	{
		return $this->belongsTo(Oferta::class, 'id_oferta');
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'id_usuario');
	}
}
