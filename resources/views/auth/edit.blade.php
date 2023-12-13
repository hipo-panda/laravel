<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/recipe-form.css') }}">
</head>
<body>
    <x-app-layout>
        <div class="tm-container-fluid">

            <h1 style="text-align: center; font-size: 2rem; margin-bottom: 20px;">레시피 작성</h1>

            <form action="/boards/{{$recipe->board_id}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
            <div class="recipe-form">
                <div class="form-group">
                    <label for="recipe-title">레시피 제목</label>
                    <input type="text" id="recipe-title" name="recipe-title" value="{{ $recipe->board_title }}">
                </div>

                <div class="form-group">
                    <label for="recipe-introduction">요리 소개</label>
                    <textarea name="recipe-introduction" id="recipe-introduction" cols="30" rows="10">{{ $recipe->board_content }}</textarea>
                </div>

                <div class="form-group">
                    <label for="recipe-ingredient">요리 재료</label>
                    <input type="text" id="recipe-ingredient" name="recipe-ingredient" value="{{ $recipe->board_ingredients }}">
                </div>

                <div class="form-group">
                    <label for="recipe-order">조리법</label>
                    <textarea name="recipe-order" id="recipe-order" cols="30" rows="10">{{ $recipe->board_cooking_orders }}</textarea>
                </div>

                <div class="form-group">
                    <label for="category">카테고리:</label>
                    <select id="recipe-category" name="category">
                        <option value="option1" {{ $recipe->board_category === 'option1' ? 'selected' : '' }}>한식</option>
                        <option value="option2" {{ $recipe->board_category === 'option2' ? 'selected' : '' }}>중식</option>
                        <option value="option3" {{ $recipe->board_category === 'option3' ? 'selected' : '' }}>양식</option>
                        <option value="option4" {{ $recipe->board_category === 'option4' ? 'selected' : '' }}>없음</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="recipe-tags">태그</label>
                    <input type="text" id="recipe-tags" name="recipe-tags" value="{{ $recipe->board_tags }}">
                </div>

                <div class="form-group">
                    <label for="recipe-img">대표 사진</label>
                    <input type="file" id="recipe-img" name="recipe-img" value="{{ $recipe->board_image }}">
                </div>

                <div>

                    <button class="sendDataButton" type="submit">등록</button>
                    <button class="sendDataButton" type="button">취소</button>

                </div>
            </div>
        </form>

        </div>
    </x-app-layout>
</body>
</html>
