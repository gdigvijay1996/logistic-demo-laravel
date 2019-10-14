<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    //
    protected $table = 'new_users';
    protected $fillable = [
        'name', 'email', 'mobile_number',
    ];

    /**
     * Get the post title.
     *
     * @param  string  $value
     * @return string
     */
    public function getNameAttribute($value)
    {
        return ucfirst($value);
    }

    /**
     * Set the post title.
     *
     * @param  string  $value
     * @return string
     */
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = strtolower($value);
        // $this->attributes['name'] = "{$this->name} {$this->email}";
    }

    public function getFullNameAttribute()
    {
        return "{$this->name} {$this->email}";
    }
}
