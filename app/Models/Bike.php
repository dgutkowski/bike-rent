<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bike extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'features',
        'cost',
        'image_path',
        'category_id'
    ];

    public function category()
    {
        return $this->belongsTo(BikeCategory::class);
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
}
