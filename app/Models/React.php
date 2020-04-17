<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class React extends Model
{
    protected $fillable = [
        'user_id',
        'type',
        'reactable_id',
        'reactable_type',
    ];

    public function reactable()
    {
        return $this->morphTo();
    }
}
