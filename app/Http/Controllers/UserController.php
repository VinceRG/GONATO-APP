<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show()
    {
        $users = [
            ['name' => 'John Doe',
            'gender' => 'Male'],
            
            ['name' => 'Vince Doe',
            'gender' => 'Female']

        ];
           return response()->json($users);
    }
    public function index(UserService $userService)
    {
      return $userService->listUsers();
    }
}
