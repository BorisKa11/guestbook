<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guestbook;

class MainController extends Controller
{
    public function index()
    {
        $subtitle = 'Главная страница';

        $messages = Guestbook::where('parent_id', 0)->with('user', 'childrens')->orderBy('updated_at', 'asc')->paginate(5);

        return view('main', compact('subtitle', 'messages'));
    }
}
