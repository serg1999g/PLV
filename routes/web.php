<?php
/**
 * @var \Illuminate\Routing\Router $router
 */

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
