<?php

namespace App\Models;

use App\Models\Repair;
use App\Models\SparePart;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Invoice extends Model
{
    use HasFactory;
    protected $table = 'invoices';

    protected $fillable = [
        'id',
        'repairId',
        'additionalCharges',
        'totalAmount',
    ];
    public function repairs()
    {
        return $this->belongsTo(Repair::class);
    }

    public function spareparts()
    {
        return $this->belongsTo(SparePart::class);
    }
}
