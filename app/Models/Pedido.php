<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;
	protected $table = 'pedidos';

	protected $casts = [
		'id_usuario' => 'int',
		'id_plan' => 'int'
	];

	protected $dates = [
		'fecha'
	];

	protected $fillable = [
		'id_usuario',
		'id_plan',
		'fecha'
	];

	public function plane()
	{
		return $this->belongsTo(Plane::class, 'id_plan');
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'id_usuario');
	}
}
