<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\OtherProfileController;
use App\Http\Controllers\ProfileController;
use App\Models\Other;

Route::post('/login', LoginController::class)->name('login');
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::middleware('auth:sanctum')->group(function () {
    // 自分のプロフィールを登録する
    Route::post('/profile/me', [ProfileController::class, 'store'])->name('profile.me');
    // 自分の登録プロフィールを取得する
    Route::get('/profile/me', [ProfileController::class, 'show'])->name('profile.me');
    // 自分の登録プロフィールを更新する
    Route::put('/profile/me', [ProfileController::class, 'update'])->name('profile.me');
    // qr読み取り後
    Route::get('/profile/{user_id}/preview', [OtherProfileController::class, 'show'])->name('profile.user');
    // ログアウト
    Route::post('/logout', LogoutController::class)->name('logout');
    
    Route::get('user', function (Request $request) {
        return $request->user();
    });
});