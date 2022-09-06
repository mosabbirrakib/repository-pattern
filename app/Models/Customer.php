<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
      'user_id',
      'name',
      'contacted_at',
      'active',
    ];

    public function user() :BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function format()
    {
        return [
            'customer_id' => data_get($this, 'id'),
            'name' => data_get($this, 'name'),
            'created_by' => data_get($this, 'user.name'),
            'last_updated' => data_get($this, 'updated_at')->diffForHumans(),
        ];
    }
}
