<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


/**
 * @property int $id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 *
 */
class Schedule extends Model
{
    use HasFactory;

    protected $table = 'schedule';
    protected $guarded = [];

    public function bell(): BelongsTo
    {
        return $this->belongsTo(Bell::class);
    }

    public function schoolClass(): BelongsTo
    {
        return $this->belongsTo(SchoolClass::class, 'class_id', 'id', 'classes');
    }

    public function subject(): BelongsTo
    {
        return $this->belongsTo(Subject::class);
    }

    public function teacher(): BelongsTo
    {
        return $this->belongsTo(Teacher::class);
    }
}
