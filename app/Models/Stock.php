<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Stock
 *
 * @property int $id
 * @property int $product_id
 * @property int $user_id
 * @property int $stock
 * @property mixed|null $expiration
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Product $product
 * @property-read \App\Models\User $user
 * @method static \Database\Factories\StockFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Stock newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Stock newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Stock query()
 * @method static \Illuminate\Database\Eloquent\Builder|Stock whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stock whereExpiration($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stock whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stock whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stock whereStock($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stock whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stock whereUserId($value)
 * @mixin \Eloquent
 */
class Stock extends Model
{
    use HasFactory;

    protected $fillable = [
        'stock',
        'expiration'
    ];

    protected $casts = [
        'expiration' => 'date:Y-m-d',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function statusColor()
    {
        if (is_null($this->expiration)){
            return "#FFFFFF";
        }
        $diff = now()->diffInDays($this->expiration, false);
        $result = 0;
        switch ($diff) {
            case $diff > 3*4:
                $result = "#2C82C9";
                break;
            case $diff > 3*3:
                $result = "#2CC990";
                break;
            case $diff > 3*2:
                $result = "#EEE657";
                break;
            case $diff > 3*1:
                $result = "#FCB941";
                break;
            case $diff > 3*0:
                $result = "#FC6042";
                break;
            default:
                $result = "#242424";
                break;
        }
        return $result;
    }
}
