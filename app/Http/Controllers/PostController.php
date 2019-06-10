<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\LikeChanged;

use App\Post;
use App\Like;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {        
        
        $posts = Post::orderBy('id', 'DESC')
                ->with(['user'])
                ->paginate(5);

        return view('posts.index', compact('posts'));
    }

    public function SaveLike(Request $request)
    {
        $like = Like::with(['post.user'])
                ->where('post_id', $request->post_id)
                ->where('user_id', $request->user_id)
                ->first();

        if($like){

            $like->state = $request->state;
            $like->save();

        } else {

            $like = Like::create([
                'post_id'   => $request->post_id,
                'user_id'   => $request->user_id,
                'state'     => $request->state,
            ]);

        }

        $likes = Like::where('post_id', $request->post_id)
                ->where('state', '1')              
                ->count();

        event(new LikeChanged($like));

        return response()->json(compact('like', 'likes'), 200);

    }

    public function GetLike(Request $request)
    {
        $like = Like::where('post_id', $request->post_id)
                ->where('user_id', $request->user_id)
                ->first();

        $likes = Like::where('post_id', $request->post_id)
                ->where('state', '1')              
                ->count();

        return response()->json(compact('like', 'likes'), 200);
    }

}
