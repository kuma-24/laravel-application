<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    use HasFactory;

    protected $fillable = [
        'administrator_id',
        'thumbnail',
        'title',
        'category',
        'explanation',
        'point',
        'period_start',
        'period_end',
    ];

    public function administrator()
    {
        return $this->belongsTo(Administrator::class, 'administrator_id');
    }
}
