<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Product;
use App\Models\Heart;

class HeartItem extends Model
{
    protected $fillable =[
        "product_id",
        "heart_id"
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function heart(): BelongsTo
    {
        return $this->belongsTo(Heart::class);
    }
}
