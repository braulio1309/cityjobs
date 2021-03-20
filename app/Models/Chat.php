<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;

	protected $table = 'chats';

	protected $casts = [
		'quien_envia' => 'int',
		'quien_recibe' => 'int'
	];

	protected $fillable = [
		'quien_envia',
		'quien_recibe',
        'mensaje',
        'estatus'
	];

	public function userrecibe()
	{
		return $this->belongsTo(User::class, 'quien_recibe');
    }

	public function userenvia()
	{
		return $this->belongsTo(User::class, 'quien_envia');
	}
}
