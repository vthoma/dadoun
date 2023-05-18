<?php

namespace App\Http\Controllers;

use App\Http\Enums\PrizeEnum;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\View\View;

class UserController extends Controller
{
    public function index(): View
    {
        return view('welcome');
    }

    public function store(StoreUserRequest $request): View
    {
        $user = User::query()->create([
            'email' => $request->validated(['email']),
            'prize' => PrizeEnum::getPrize()->label,
        ]);

        return view('result', compact('user'));
    }
}
