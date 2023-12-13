<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/recipe.css') }}">

</head>
<body>
    <x-app-layout>
        <div class="tm-container-fluid">
            <section class="recipe-header">

                <div class="recipe-header-content">
                    <img src="{{ asset('storage/images/' . $board->board_image) }}" alt="">
                    <h1>{{ $board->board_title }}</h1>
                    <h2>{{ $board->board_content }}</h2>

                        <p>{{ $board->board_tags }}</p>
                </div>

            </section>

            <section class="ingredient-section">
                <div class="ingredient-content">
                    <h1>Ingredient</h1>
                    <div class="ingredient">
                        <h2>{{ $board->board_ingredients }}</h2>
                    </div>
                </div>

            </section>


            <section class="cooking-order-section">
                <div class="cooking-order-content">
                    <h1>Cooking order</h1>
                    <div class="cooking-order">
                        <p>{{ $board->board_cooking_orders }}</p>
                    </div>
                </div>

            </section>

            <div class="buttons">

                @if(Auth::user()->name === $board->name)
                    <form action="{{ route('board.edit', ['board_id' => $board->board_id]) }}" method="get" enctype="multipart/form-data">
                        <button class="sendButton" type="submit">수정</button>
                    </form>

                <form action="/boards/{{$board->board_id}}" method="post">
                    @csrf
                    @method('delete')
                    <button  class="sendButton"  type="submit">삭제</button>
                </form>
                @endif

            </div>
        </div>
    </x-app-layout>
</body>
</html>
