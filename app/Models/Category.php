<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Category extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'created_by',
    ];

    public static function boot()
    {
        parent::boot();

        // create a event to happen on inserting
        static::creating(function ($table) {
            $table->created_by = Auth::user()->id;
        });

    }

    public function expenses()
    {
        return $this->hasMany('App\Models\Expense');
    }
}
