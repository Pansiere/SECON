<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transactions';
    protected $fillable = [
        'user_id',
        'type',
        'value',
        'description',
        'category_id',
        'date'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }
}
