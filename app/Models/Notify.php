<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notify extends Model
{
    use HasFactory;

	protected $table = 'notifies';

	protected $casts = [
		'quien_recibe' => 'int',
		'estatus' => 'int'
	];

	protected $fillable = [
		'quien_recibe',
		'icono',
		'mensaje',
		'estatus'
	];

	public function user()
	{
		return $this->belongsTo(User::class, 'quien_recibe');
    }

    public function scopeSinleer($query){
        return $query->where('estatus',0);
    }

    
}
