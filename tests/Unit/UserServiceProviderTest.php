<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;


class UserServiceProviderTest extends TestCase
{
    /**
     * @dataProvider sameStringsProvider
     */
    public function testSqlStringIsSame($param, $searchTerm)
    {
        $actualQuery = User::whereLike($param, $searchTerm)->toSql();
        $expectedQuery = "select * from `users` where `$param` LIKE ?";
        $this->assertEquals($expectedQuery, $actualQuery);
    }


    public function sameStringsProvider()
    {
        return [
            [
                'email',
                'john',
            ],[
                '',
                '',
            ],
        ];
    }

}
