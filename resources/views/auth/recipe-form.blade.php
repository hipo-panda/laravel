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

            <form action="/post" method="post" enctype="multipart/form-data">
                @csrf
            <div class="recipe-form">
                <div class="form-group">
                    <label for="recipe-title">레시피 제목</label>
                    <input  type="text" id="recipe-title" name="recipe-title">
                </div>

                <div class="form-group">
                    <label for="recipe-introduction">요리 소개</label>
                    <textarea name="recipe-introduction" id="recipe-introduction" cols="30" rows="10"></textarea>
                </div>

                <div class="form-group">
                    <label for="recipe-ingredient">요리 재료</label>
                    <input type="text" id="recipe-ingredient" name="recipe-ingredient">
                </div>


                <div class="form-group">
                    <label for="recipe-order">조리법</label>
                    <textarea name="recipe-order" id="recipe-order" cols="30" rows="10"></textarea>
                </div>

                <div class="form-group">
                    <label for="category">카테고리:</label>
                    <select id="recipe-category" name="category">
                        <option value="option1">한식</option>
                        <option value="option2">중식</option>
                        <option value="option3">양식</option>
                        <option value="option3">없음</option>

                    </select>
                </div>

                <div class="form-group">
                    <label for="recipe-tags">태그</label>
                    <input type="text" id="recipe-tags" name="recipe-tags">
                </div>

                <div class="form-group">
                    <label for="recipe-img">대표 사진</label>
                    <input type="file" id="recipe-img" name="recipe-img">
                </div>

                <div>
                    <button class="sendDataButton" type="submit">등록</button>
                </div>
            </div>
        </form>

        </div>
    </x-app-layout>
</body>
</html>
