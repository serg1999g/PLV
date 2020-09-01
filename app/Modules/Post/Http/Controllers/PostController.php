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
    /**
     * Show all posts
     *
     */
    public function index()
    {
        $posts = Post::latest()->paginate(10);

        return view('web.posts.index', ['posts' => $posts]);
    }

    /**
     * Create post
     *
     * @throws AuthorizationException
     */
    public function create()
    {
        $this->authorize('create', Post::class);

        return view('web.posts.create');
    }

    /**
     * Store post
     *
     * @param PostRequest $request
     * @return RedirectResponse
     */
    public function store(PostRequest $request)
    {
        $user = $request->user();
        $user->posts()->create($request->all());
        $user->save();

        return redirect()->route('web.posts.index');
    }

    /**
     * Edit post if you are its creator
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
     * Update post if you are its creator
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
     * Show post
     *
     * @param $id
     * @return Application|Factory|View
     */
    public function show(int $id)
    {
        $post = Post::find($id);

        return view('web.posts.show', ['post' => $post]);
    }

    /**
     * Delete post if you are its creator
     *
     * @param $id
     * @return RedirectResponse
     * @throws AuthorizationException
     */
    public function destroy(int $id)
    {
        $post = Post::find($id);
        $this->authorize('delete', $post);
        $post->delete();

        return redirect()->route('web.posts.index');
    }
}
