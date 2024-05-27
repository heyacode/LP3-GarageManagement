<?php

namespace App\Models;

use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Repair extends Model
{
    use HasFactory;
    protected $table = "repairs";

    protected $fillable = [
        'id',
        'description',
        'status',
        'start_date',
        'end_date',
        'mecanicNotes',
        'clientNotes',
        'mecanicId',
        'vehicleId',
    ];
    public function vehiclse()
    {
        return $this->belongsTo(Vehicle::class);
    }

    public function mecanics()
    {
        return $this->belongsTo(User::class);
    }
}
