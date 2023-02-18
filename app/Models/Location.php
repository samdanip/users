<?php

namespace App\Models;

use App\Models\Visitor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Location extends Model
{
    use HasFactory;

    public function post(): BelongsTo
    {
        return $this->belongsTo(Visitor::class);
    }
}
