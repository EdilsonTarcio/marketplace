<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;
    protected $fillable = [
        'banner',
        'title_one',
        'title_two',
        'starting_price',
        'link',
        'serial',
        'status'
    ];
}
