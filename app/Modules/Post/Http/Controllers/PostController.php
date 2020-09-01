<?php

namespace App\Modules\Post\Http\Controllers;

use App\Core\Http\Controllers\Controller;
use App\Modules\Post\Http\Requests\PostRequest;
use App\Modules\Post\Models\Post;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->paginate(10);

        return view('web.posts.index', ['posts' => $posts]);
    }

    /**
     * create post
     *
     * @throws AuthorizationException
     */
    public function create()
    {
        $this->authorize('create', Post::class);

        return view('web.posts.create');
    }

    public function store(PostRequest $request)
    {
        $user = $request->user();
        $user->posts()->create($request->all());
        $user->save();

        return redirect()->route('web.posts.index');
    }

    /**
     * update post
     *
     * @param $id
     * @return Application|Factory|View
     * @throws AuthorizationException
     */
    public function edit(int $id)
    {
        $post = Post::find($id);
        $this->authorize('update', $post);

        return view('web.posts.edit', ['post' => $post]);
    }

    /**
     * update post
     *
     * @param PostRequest $request
     * @param $id
     * @return RedirectResponse
     * @throws AuthorizationException
     */
    public function update(PostRequest $request, int $id)
    {
        $post = Post::find($id);
        $this->authorize('update', $post);
        $post->fill($request->all());
        $post->save();

        return redirect()->route('web.posts.index');
    }

    /**
     * update post
     * @param $id
     * @return Application|Factory|View
     */
    public function show(int $id)
    {
        $post = Post::find($id);

        return view('web.posts.show', ['post' => $post]);
    }
}
