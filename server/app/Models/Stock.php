<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
