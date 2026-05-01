<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogisticsPartner extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'phone',
        'alternate_phone',
        'address',
        'city',
        'state',
        'vehicle_type',
        'vehicle_model',
        'license_number',
        'id_card_type',
        'id_card_number',
        'id_card_image',
        'driver_license_image',
        'bank_name',
        'account_number',
        'account_name',
        'status',
        'rejection_reason',
        'approved_at',
        'rejected_at',
        'is_active',
    ];

    protected $casts = [
        'approved_at' => 'datetime',
        'rejected_at' => 'datetime',
        'is_active' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function isApproved()
    {
        return $this->status === 'approved';
    }

    public function isPending()
    {
        return $this->status === 'pending';
    }

    public function isRejected()
    {
        return $this->status === 'rejected';
    }
}