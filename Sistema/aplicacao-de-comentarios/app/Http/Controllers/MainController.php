<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Notice;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        return view('home', ['notices' => Notice::all()]);
    }

    public function create(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'comment' => 'required|min:3',
        ]);

        $comment = new Comment();

        $comment->email = $request->email;
        $comment->comment = $request->comment;
        $comment->notice_id = $request->notice_id;

        $comment->save();

        return redirect("/noticia/$request->notice_id/#comentarios")->with('message', 'Comentário registrado com sucesso!');

    }

    public function showNotice($id)
    {
        return view('noticia', [
            'notice' => Notice::find($id),
            'comments' => Comment::where('notice_id', "=", $id)->simplePaginate(20),
        ]);

    }
}
