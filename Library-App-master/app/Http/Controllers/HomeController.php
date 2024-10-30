<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Book;
use App\Models\Borrow;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $data = Book::all();
        return view('home.index', compact('data'));
    }

    public function borrow_books($id)
{
    $data = Book::find($id);
    if (!$data) {
        return redirect()->back()->with('error', 'Book not found!');
    }

    $book_id = $id;
    $quantity = $data->quantity;

    if($quantity >= 1)
    {
        if(Auth::check())
        {
            $user_id = Auth::id();
            $borrow = new Borrow;
            $borrow->book_id = $book_id;
            $borrow->user_id = $user_id;
            $borrow->status = 'Applied';
            $borrow->save();

            return redirect()->back()->with('message', 'A Borrow Request has been sent!');
        }
        else
        {
            return redirect('/login');
        }
    }
    else
    {
        return redirect()->back()->with('message', 'No Books Available!');
    }
}
}
