<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisitaUser extends Model
{
 use HasFactory;

	protected $table = 'visita_users';

	protected $casts = [
		'id_usuario' => 'int'
	];

	protected $fillable = [
		'id_usuario'
	];

	public function usuario_vistad()
	{
		return $this->belongsTo(User::class, 'id_usuario');
	}

}
