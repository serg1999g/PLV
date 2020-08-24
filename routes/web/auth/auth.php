<?php
/**
 * @var \Illuminate\Routing\Router $router
 */

use App\Modules\Auth\Http\Controllers\ResetPasswordController;
use App\Modules\Auth\Http\Controllers\LoginController;
use App\Modules\Auth\Http\Controllers\RegisterController;
use App\Modules\Auth\Http\Controllers\ForgotPasswordController;
use App\Modules\Auth\Http\Controllers\ConfirmPasswordController;
use App\Modules\Auth\Http\Controllers\VerificationController;

$router->get('login', [LoginController::class, 'showLoginForm'])->name('login');
$router->post('login', [LoginController::class, 'login']);
$router->post('logout', [LoginController::class, 'logout'])->name('logout');

$router->get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
$router->post('register', [RegisterController::class, 'register']);

$router->get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
$router->post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
$router->get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
$router->post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');

$router->get('password/confirm', [ConfirmPasswordController::class, 'showConfirmForm'])->name('password.confirm');
$router->post('password/confirm', [ConfirmPasswordController::class, 'confirm']);

$router->get('email/verify', [VerificationController::class, 'show'])->name('verification.notice');
$router->get('email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->name('verification.verify');
$router->post('email/resend', [VerificationController::class, 'resend'])->name('verification.resend');
