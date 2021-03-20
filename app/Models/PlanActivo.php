<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanActivo extends Model
{
    use HasFactory;

	protected $table = 'plan_activos';

	protected $casts = [
		'id_usuario' => 'int',
		'id_plan' => 'int',
		'dias_restantes' => 'int'
	];

	protected $fillable = [
		'id_usuario',
		'id_plan',
		'dias_restantes'
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
