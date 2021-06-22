<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class UserController extends Controller
{
    /**
     * @var string
     */
    private const VIEWS_COUNT_COL = "views_count";

    /**
     * @var string
     */
    private const USER_ID_COL = "id";

    /**
     * @var string
     */
    private const USER_NAME_COL = "name";

    /**
     * @var string
     */
    private const USER_SURNAME_COL = "surname";

    /**
     * @var string
     */
    private const USER_EMAIL_COL = "email";

    /**
     * @var string
     */
    private const USER_CREATED_AT_COL = "created_at";


    public function index(): void
    {
        User::increment(self::VIEWS_COUNT_COL, 1);
        $allUsers = User::all();
        dd($allUsers);
    }


    public function getRandom(): void
    {
        $randomUser = User::inRandomOrder()->first();
        $randomUser->increment(self::VIEWS_COUNT_COL, 1);
        $randomUserArr = $randomUser->toArray();
        dd($randomUserArr);
    }


    public function show(int $id): void
    {
        $user = User::select(
            self::USER_NAME_COL,
            self::USER_SURNAME_COL,
            self::USER_EMAIL_COL,
            self::USER_CREATED_AT_COL
        )
            ->where(self::USER_ID_COL, $id)
            ->first();
        if ($user) {
            $user->increment(self::VIEWS_COUNT_COL, 1);
            $userArr = $user->toArray();
            unset(
                $userArr[self::USER_NAME_COL], 
                $userArr[self::USER_SURNAME_COL], 
                $userArr[self::VIEWS_COUNT_COL]);
            dd($user);
        } else {
            dd("User with id: $id does not exist!");
        }
    }
}
