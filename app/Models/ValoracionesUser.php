<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ValoracionesUser extends Model
{
    use HasFactory;

	protected $table = 'valoraciones_users';

	protected $casts = [
		'envia_valora_id' => 'int',
		'recibe_valora_id' => 'int',
		'valor' => 'int'
	];

	protected $fillable = [
		'envia_valora_id',
		'recibe_valora_id',
		'valor',
		'comentarios'
	];

	public function usuarios_evaluados()
	{
		return $this->belongsTo(User::class, 'recibe_valora_id');
	}
	public function usuarios_evaluadores()
	{
		return $this->belongsTo(User::class, 'envia_valora_id');
	}
}
