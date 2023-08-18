<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdministratorAccount extends Model
{
    use HasFactory;

    protected $fillable = [
        'administrator_id',
        'first_name',
        'last_name',
        'first_name_kana',
        'last_name_kana',
        'sex',
        'date_of_birth',
    ];

    public function administrator()
    {
        return $this->belongsTo(Administrator::class, 'administrator_id');
    }
}
