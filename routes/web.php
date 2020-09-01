<?php
/**
 * @var \Illuminate\Routing\Router $router
 */

use App\Modules\Post\Http\Controllers\PostController;
use Illuminate\Routing\RouteFileRegistrar;
use App\Modules\Home\Http\Controllers\HomeController;

$registrar = new RouteFileRegistrar($router);
$registrar->register(base_path('routes/web/auth/auth.php'));

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

$router->get('/', [HomeController::class, 'index'])->name('web.sections.home');

$router->middleware(['auth'])->group(function () use ($router) {
    $router->get('posts', [PostController::class, 'index'])->name('web.posts.index');
    $router->get('posts/create', [PostController::class, 'create'])->name('web.posts.create');
    $router->post('posts', [PostController::class, 'store'])->name('web.posts.store');
    $router->get('posts/{id}/edit', [PostController::class, 'edit'])->name('web.posts.edit');
    $router->post('posts/{id}', [PostController::class, 'update'])->name('web.posts.update');
    $router->get('posts/{id}', [PostController::class, 'show'])->name('web.posts.show');
    $router->delete('posts/{id}/destroy', [PostController::class, 'destroy'])->name('web.posts.destroy');
});
