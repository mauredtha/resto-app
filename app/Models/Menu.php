<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use Uuids;
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
        'description',
        'pict',
        'price',
        'status',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
