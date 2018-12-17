<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Expense extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'note', 'amount', 'date', 'category_id', 'created_by',
    ];

    public static function boot()
    {
        parent::boot();

        // create a event to happen on inserting
        static::creating(function ($table) {
            $table->created_by = Auth::user()->id;
        });

    }

    /**
     * The genres that belong to the film.
     */
    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
}
