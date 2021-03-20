<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAdj extends Model
{
    use HasFactory;

	protected $table = 'user_adjs';

	protected $casts = [
		'id_user' => 'int'
	];

	protected $fillable = [
		'id_user',
		'nombre',
		'ruta'
	];

	public function user()
	{
		return $this->belongsTo(User::class, 'id_user');
	}
}
