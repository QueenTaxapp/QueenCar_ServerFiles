<?php

namespace Tests\Unit;





use App\Containers\Authorization\Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;



class UserTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
            $response = $this->json('POST', '/v1/user/deletefav', ['id' => '12','token' => 'Favorite_Deleted_Successfully','favid' => 1]);

        $response
            ->assertStatus(200)
            ->assertJson([
                'created' => true,
            ]);
    }
}
