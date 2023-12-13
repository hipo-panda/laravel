<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Board;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;


class BoardController extends Controller
{
    public function create()
    {
        return view('./auth.recipe-form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'recipe-title' => 'required|string|max:255',
            'recipe-introduction' => 'required|string',
            'recipe-ingredient' => 'required|string',
            'recipe-order' => 'required|string',
            'category' => 'required|string',
            'recipe-tags' => 'nullable|string',
            'recipe-img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('recipe-img')) {
            $image = $request->file('recipe-img');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/images', $imageName);
        } else {
            $imageName = null;
        }


        $board = new Board();
        $board->board_title = $request->input('recipe-title');
        $board->board_content = $request->input('recipe-introduction');
        $board->board_ingredients = $request->input('recipe-ingredient');
        $board->board_cooking_orders = $request->input('recipe-order');
        $board->board_category = $request->input('category');
        $board->board_tags = $request->input('recipe-tags');
        $board->board_image = $imageName;
        $board->name = Auth::user()->name;
        $board->save();



        $request->session()->put('image_name', $imageName);


        return redirect('/home')->with('success', 'Recipe created successfully!');
    }

    public function showImg($borad_id)
    {
        $board = Board::find($borad_id);
        return view('auth.home', compact('board'));

    }


    public function index()
    {
        $boards = Board::inRandomOrder()->get();
        View::share('boards', $boards);

        return view('auth.home', compact('boards'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        $results = Board::where('board_title', 'like', '%' . $query . '%')->get();

        return view('auth.foodlist', compact('results'));
    }


    public function show($board_id)
    {

        $board = Board::find($board_id);


        return view('auth.recipeInfo', compact('board'));
    }

    public function edit($board_id)
    {
        $recipe = Board::find($board_id);

        return view('auth.edit', compact('recipe'));
    }

    public function update(Request $request, Board $board)
    {

        $request->validate([
            'recipe-title' => 'required|string|max:255',
        ]);

        $board->update([
            'board_title' => $request->input('recipe-title'),
            'board_content' => $request->input('recipe-introduction'),
            'board_ingredients' => $request->input('recipe-ingredient'),
            'board_cooking_orders' => $request->input('recipe-order'),
            'board_category' => $request->input('category'),
            'board_tags' => $request->input('recipe-tags'),

        ]);




        return view('auth.recipeInfo', compact('board'));

    }

    public function destroy(Board $board) {
        $board->delete();

       return view('auth.home');

    }

}
