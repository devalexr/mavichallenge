<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Client extends Model
{
    protected $table = 'clients';

    public static function validations()
    {
        return [
            'name' => 'required',
            'last_name' => 'required',
            'address' => 'required',
            'email' => 'required|string|email|max:254',
        ];
    }
}
