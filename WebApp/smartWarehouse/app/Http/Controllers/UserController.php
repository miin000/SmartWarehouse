<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getUser($id)
    {
        // Giả lập dữ liệu user
        $users = [
            1 => ['id' => 1, 'name' => 'John Doe', 'email' => 'john@example.com'],
            2 => ['id' => 2, 'name' => 'Jane Smith', 'email' => 'jane@example.com'],
            3 => ['id' => 3, 'name' => 'Mark Taylor', 'email' => 'mark@example.com']
        ];

        // Kiểm tra xem ID có tồn tại không
        if (!array_key_exists($id, $users)) {
            abort(404, 'User not found');
        }

        // Trả về view với dữ liệu user
        return view('user.profile', ['user' => $users[$id]]);
    }
}
