<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static selectRaw(string $string)
 * @method static create(array|int[]|null[]|string[] $array_merge)
 * @method static where(string $string, string $id)
 */
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
