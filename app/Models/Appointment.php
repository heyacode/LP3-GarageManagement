<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'adate',
        'atime',
        'mark',
        'model',
        'photo',
        'comment',
    ];

    protected $casts = [
        'photo' => 'array', // Cast 'photo' as an array
    ];
}

