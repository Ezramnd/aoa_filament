<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Device extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'type',
        'status',
        'location',
        'active_start',
        'active_end',
    ];
    

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'active_start' => 'datetime',
        'active_end' => 'datetime',
    ];

    // Boot method untuk menambahkan event listener
    protected static function booted()
    {
        static::updating(function ($device) {
            if ($device->isDirty('status')) {
                if ($device->status) {
                    // Jika status berubah ke aktif
                    $device->active_start = now();
                    $device->active_end = null;
                } else {
                    // Jika status berubah ke non-aktif
                    $device->active_end = now();
                }
            }
        });
    }

     // Accessor untuk menghitung durasi aktif
     public function getActiveDurationAttribute()
     {
        if ($this->status && $this->active_start) {
            $endTime = $this->active_end ?? now();
            return $this->active_start->diffInSeconds($endTime);
        }
    
        return null;
    }
    
}
