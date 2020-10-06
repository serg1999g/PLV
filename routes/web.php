<?php
/**
 * @var \Illuminate\Routing\Router $router
 */

use App\Modules\Post\Http\Controllers\PostController;
use Illuminate\Routing\RouteFileRegistrar;
use App\Modules\Home\Http\Controllers\HomeController;
use Illuminate\Routing\Router;

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

$router->as('web.posts.')->prefix('posts')->middleware(['auth'])->group(function (Router $router) {
    $router->get('/', [PostController::class, 'index'])->name('index');
    $router->get('create', [PostController::class, 'create'])->name('create');
    $router->post('/', [PostController::class, 'store'])->name('store');
    $router->get('{id}/edit', [PostController::class, 'edit'])->name('edit');
    $router->post('{id}', [PostController::class, 'update'])->name('update');
    $router->get('{id}', [PostController::class, 'show'])->name('show');
    $router->delete('{id}/destroy', [PostController::class, 'destroy'])->name('destroy');
});
