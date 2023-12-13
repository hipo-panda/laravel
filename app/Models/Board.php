<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    use HasFactory;


    protected $table = 'boards'; // 모델과 연결할 테이블 이름

    protected $primaryKey = 'board_id'; // 기본 키의 이름 (기본값은 'id')

    protected $fillable = [
        'board_title',
        'board_content',
        'board_ingredients',
        'board_cooking_orders',
        'board_category',
        'board_tags',
        'board_image',
        'name',
        // 다른 필드를 추가할 경우 여기에 추가
    ];
}
