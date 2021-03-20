<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class UserLinea extends Model
{
    use HasFactory;

    public static function actualiza($cual)
    {

        $userId = Auth::id();
        $user = User::findOrFail($userId);
        $user->enlinea=$cual;
        $user->save();

    }
}
