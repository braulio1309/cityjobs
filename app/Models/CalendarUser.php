<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalendarUser extends Model
{

    use HasFactory;

	protected $table = 'calendar_users';

	protected $casts = [
		'user_id' => 'int',
		'user_contratador' => 'int'
	];

	protected $dates = [
		'fecha_dia',
		'hora_inicio',
		'hora_fin'
	];

	protected $fillable = [
		'user_id',
		'fecha_dia',
		'hora_inicio',
		'hora_fin',
		'user_contratador'
    ];

    protected static function boot() {
        parent::boot();
        self::creating(function ($table) {
            if ( ! app()->runningInConsole()) {
                $table->user_id = auth()->id();
            }
        });
    }

	public function userpertenece()
	{
		return $this->belongsTo(User::class,'user_id');
    }

	public function usercontrata()
	{
		return $this->belongsTo(User::class,'user_contratador');
	}
}
