<?php

namespace App\Models;

use App\Observers\WithdrawlObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Withdrawl extends Model
{
    use HasFactory;

    // protected $primaryKey = 'uuid';


    protected $fillable = [
        'user_id',
        'mode',
        'name',
        'details',
        'amount',
        'currency',
        'status',
        'callbackurl',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }


    public static function boot(): void
    {    parent::boot();

        Withdrawl::observe(WithdrawlObserver::class);

    }

}
