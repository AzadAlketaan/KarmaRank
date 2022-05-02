<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'url'
    ];

    public static function getFillables()
    {
        return (new Image())->fillable;
    }

    public function User()
    {
        return $this->hasMany('App\Models\User')->orderBy('created_at', 'DESC');
    }
}
