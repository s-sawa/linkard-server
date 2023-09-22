<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getFollowingUsers(Request $request)
    {
        $user = Auth::user(); // ログイン中のユーザーを取得

        // グループIDに基づいて絞り込む場合
        if ($request->has('groupId')) {
            $followingUsers = $user->followingUsers()->wherePivot('group_id', $request->groupId)->get();

            return response()->json($followingUsers);
        }

        // グループIDが指定されていない場合、すべてのフォロー中のユーザーを取得
        $followingUsers = $user->followingUsers()->get(); // クエリの実行

        return response()->json($followingUsers);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
