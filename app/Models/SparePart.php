<?php

namespace App\Models;

use App\Models\Repair;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SparePart extends Model
{
    use HasFactory;
    protected $table = 'spareparts';

    protected $fillable = [
        'id',
        'partName',
        'partReference',
        'supplier',
        'price',
    ];
    public function repairs()
    {
        return $this->belongsToMany(Repair::class)->withPivot('quantity');
    }
}
