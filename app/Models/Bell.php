<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property Carbon $start_time
 * @property Carbon $end_time
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Bell extends Model
{
    use HasFactory;

    protected $guarded = [];
}
