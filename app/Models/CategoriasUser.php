<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriasUser extends Model
{
    use HasFactory;

	protected $table = 'categorias_users';

	protected $casts = [
		'id_usuario' => 'int',
		'categoria' => 'int',
		'subcatego' => 'int',
		'especialida' => 'int'
	];

	protected $fillable = [
		'id_usuario',
		'categoria',
		'subcatego',
		'especialida'
	];

    protected static function boot()
    {
        parent::boot();
        self::creating(function ($table) {
            if ( ! app()->runningInConsole()) {
                $table->user_id = auth()->id();
            }
        });
    }
    
	public function categoria()
	{
		return $this->belongsTo(Categoria::class, 'categoria');
	}

	public function especialidade()
	{
		return $this->belongsTo(Especialidade::class, 'especialida');
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'id_usuario');
	}

	public function subcategoria()
	{
		return $this->belongsTo(Subcategoria::class, 'subcatego');
	}
}
