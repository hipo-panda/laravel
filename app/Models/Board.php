<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    use HasFactory;


    protected $table = 'boards';

    protected $primaryKey = 'board_id';

    protected $fillable = [
        'board_title',
        'board_content',
        'board_ingredients',
        'board_cooking_orders',
        'board_category',
        'board_tags',
        'board_image',
        'name',
    ];
}
