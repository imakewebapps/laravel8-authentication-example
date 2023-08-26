<?php

namespace App\Models;

use App\Observers\DepositObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deposit extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'mode',
        'token',
        'amount',
        'currency',
        'note',
        'successredirect',
        'failredirect',
        'callbackurl',
        'status',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public static function boot(): void
    {    parent::boot();

        Deposit::observe(DepositObserver::class);

    }

}
