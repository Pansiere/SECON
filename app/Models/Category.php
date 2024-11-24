<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @method static find(string $id)
 * @method static where(string $string, int|string|null $id)
 * @property mixed $name
 * @property int|mixed|string|null $user_id
 */
class Category extends Model
{
    protected $table = 'categories';

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
