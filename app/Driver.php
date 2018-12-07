<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    protected $fillable = ['name', 'city'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function radars()
    {
        return $this->hasMany(Radar::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class)->withDefault([
            'name' => ''
        ]);
    }
}
