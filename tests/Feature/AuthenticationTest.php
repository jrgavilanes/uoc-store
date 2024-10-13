<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function login_redirects_to_dashboard_if_admin()
    {
        $admin = User::factory()->create(['is_admin' => true]);

        $response = $this->post(route('login.post'), [
            'email' => $admin->email,
            'password' => 'password'
        ]);

        $response->assertRedirect(route('dashboard'));
    }

    #[Test]
    public function login_redirects_to_home_if_not_admin()
    {
        $user = User::factory()->create(['is_admin' => false]);

        $response = $this->post(route('login.post'), [
            'email' => $user->email,
            'password' => 'password'
        ]);

        $response->assertRedirect(route('home'));
    }

}
