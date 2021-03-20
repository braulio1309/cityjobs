<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoPlan extends Model
{
    use HasFactory;
	protected $table = 'tipoplans';

	protected $fillable = [
		'nombre'
	];

	public function planes()
	{
		return $this->hasMany(Plan::class, 'id_tipoplan');
	}
}
