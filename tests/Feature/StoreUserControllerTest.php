<?php

namespace Tests\Feature;

use App\Http\Enums\PrizeEnum;
use App\Models\User;
use Tests\TestCase;

class StoreUserControllerTest extends TestCase
{
    public function test_store_user_returns_a_successful_response()
    {
        $this
            ->post('/', ['email' => 'john@mail.com', 'prize' => PrizeEnum::getPrize()])
            ->assertStatus(200);

        $this->assertDatabaseHas('users', [
            'email' => 'john@mail.com',
        ]);
    }

    public function test_denies_store_user_if_the_email_is_already_used()
   {
        User::factory()->create([
            'email' => 'john@mail.com',
            'prize' => PrizeEnum::getPrize()->label,
        ]);

        $this
            ->post('/', ['email' => 'john@mail.com', 'prize' => PrizeEnum::getPrize()])
            ->assertStatus(302);

        $this->assertDatabaseHas('users', [
            'email' => 'john@mail.com',
        ]);
    }

    public function test_denies_store_user_email_in_wrong_format()
    {
        $this
            ->post('/', ['email' => '<toto>', 'prize' => PrizeEnum::getPrize()])
            ->assertStatus(302);

        $this->assertDatabaseMissing('users', [
            'email' => '<toto>',
        ]);
    }

    public function test_views_prize(): void
    {
        $user = User::factory()->create();
        $view = $this->view('result', ['user' => $user]);

        $view->assertSee($user->prize);
    }
}
