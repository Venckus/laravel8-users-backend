<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class UserController extends Controller
{
    
    public function index(): void
    {
        User::increment(User::VIEWS_COUNT_COL, 1);
        $allUsers = User::all();
        dd($allUsers);
    }


    public function getRandom(): void
    {
        $randomUser = User::inRandomOrder()->first();
        $randomUser->increment(User::VIEWS_COUNT_COL, 1);
        $randomUserArr = $randomUser->toArray();
        dd($randomUserArr);
    }


    public function show(int $id): void
    {
        $user = User::select(
            User::NAME_COL,
            User::SURNAME_COL,
            User::EMAIL_COL,
            User::CREATED_AT_COL
        )
            ->where(User::ID_COL, $id)
            ->first();
        if ($user) {
            $user->increment(User::VIEWS_COUNT_COL, 1);
            $userArr = $user->toArray();
            unset(
                $userArr[User::NAME_COL], 
                $userArr[User::SURNAME_COL], 
                $userArr[User::VIEWS_COUNT_COL]);
            dd($userArr);
        } else {
            dd("User with id: $id does not exist!");
        }
    }


    public function getMostPopular(int $benchmark = 10): void
    {
        $users = User::mostPopular()->limit($benchmark)->get();
        dd($users);
    }
}
