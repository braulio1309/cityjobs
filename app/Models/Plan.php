<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;
	protected $table = 'planes';

	protected $casts = [
		'id_tipoplan' => 'int',
		'tipo' => 'int',
		'dias_durac' => 'int',
		'costo' => 'float',
		'kms_minimo' => 'int'
	];

	protected $fillable = [
		'id_tipoplan',
		'tipo',
		'nombre',
		'descripcion',
		'dias_durac',
		'costo',
		'ahorro',
		'kms_minimo'
	];

	public function tipoplan()
	{
		return $this->belongsTo(TipoPlan::class, 'id_tipoplan');
	}

	public function pedidos()
	{
		return $this->hasMany(Pedido::class, 'id_plan');
	}

	public function plan_activos()
	{
		return $this->hasMany(PlanActivo::class, 'id_plan');
	}
}
