<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property string $name Status name
 */
class TaskStatus extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = ['name'];

    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class, 'status_id');
    }
}
