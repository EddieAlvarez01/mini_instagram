<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    //POSTEAR UN COMENTARIO
    public function postComment(Request $req){
        $req->validate([
            'content' => ['required', 'string', 'max:1500'],
            'img_id' => ['required', 'numeric']
        ]);
        $comment = new Comment();
        $comment->content = $req->input('content');
        $comment->user_id = Auth::id();
        $comment->image_id = $req->input('img_id');
        $comment->save();
        return response($comment, 200);
    }

    //BORRAR COMENTARIOS
    public function deleteComment($id){

        //TRAER EL COMENTARIO
        $comment = Comment::find($id);
        $comment->delete();
        return redirect()->action('HomeController@index')->with('alert-success', 'Comentario eliminado exitosamente');
    }

}
