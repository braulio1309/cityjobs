<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeguidoresUser extends Model
{
    use HasFactory;

	protected $table = 'seguidores_users';

	protected $casts = [
		'seguidor_id' => 'int',
		'seguido_id' => 'int'
	];

	protected $fillable = [
		'seguidor_id',
		'seguido_id'
	];

	public function userseguidor()
	{
		return $this->belongsTo(User::class, 'seguidor_id');
	}
	public function userseguido()
	{
		return $this->belongsTo(User::class, 'seguido_id');
	}
}
