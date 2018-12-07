<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Radar extends Model
{
    use SoftDeletes;

    protected $fillable = ['date', 'number', 'distance', 'time', 'user_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function driver()
    {
        return $this->belongsTo(Driver::class)->withDefault([
            'name' => '',
            'city' => '',
        ]);
    }

    public function user()
    {
        return $this->belongsTo(User::class)->withDefault([
            'name' => ''
        ]);
    }
}
