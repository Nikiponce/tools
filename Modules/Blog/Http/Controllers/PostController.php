<?php

namespace Modules\Blog\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Blog\Entities\Post;
use Illuminate\Routing\Controller;
use Modules\Blog\Transformers\PostResource;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return Post::paginate(5);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $params = $request->all();
        // TODO validar slug
        $post = Post::Create([
            'title' => $params['title'],
            'description' => $params['description'],
            'content' => $params['content'],
            'slug' => Post::toSlug($params['title'])
        ]);
        dd($post);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show(Post $post)
    {
        return new PostResource($post);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy(Post $post)
    {
        if ($post->delete()) {
            return response()->json(['message' => 'OK']);
        }
        return response()->json(['error' => 'Not found'], 400);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function restore($id)
    {
        $post = Post::withTrashed()
            ->where('id', $id)->restore();
        if ($post) {
            return response()->json(['message' => 'OK']);
        }
        return response()->json(['error' => 'Not found'], 400);
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function trashList()
    {
        $posts = Post::onlyTrashed()->paginate();
        return PostResource::collection(($posts));
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function category(Request $request)
    {
        $post = Post::find($request->id);

        if ($post->categories()->where('category_id',$request->category_id)->exists()) {
            $post->categories()->detach($request->category_id);
        } else {
            $post->categories()->attach($request->category_id);
        }

        if ($post) {
            return response()->json(['message' => 'OK']);
        }
        return response()->json(['error' => 'Not found'], 400);
    }
    
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function image(Request $request)
    {
        $post = Post::find($request->id);

        if ($post->image_id !== null) {
            $post->image_id = null;
        } else {
            $post->image_id = $request->image_id;
        }
        if ($post->save()) {
            return response()->json(['message' => 'OK']);
        }
        return response()->json(['error' => 'Not found'], 400);
    }
}
