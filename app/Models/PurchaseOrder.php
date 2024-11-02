<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;

class PurchaseOrder extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['date', 'supplier', 'total_amount', 'status', 'creator_id'];

    /**
     * Get the creator of the purchase order.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    public function creator()
    {
        return $this->belongsTo(User::class, 'creator_id');
    }
}
