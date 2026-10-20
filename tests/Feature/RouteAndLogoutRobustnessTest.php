<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RouteAndLogoutRobustnessTest extends TestCase
{
    use RefreshDatabase;

    public function test_get_admin_logout_redirects_gracefully_without_405(): void
    {
        $admin = User::firstOrCreate(
            ['email' => 'admin_test@jayamaju.com'],
            [
                'name' => 'Admin Tester',
                'password' => bcrypt('password123'),
                'role' => 'admin',
                'is_admin' => true,
            ]
        );

        $response = $this->actingAs($admin)->get('/admin/logout');

        $response->assertRedirect(route('admin.login'));
        $this->assertGuest();
    }

    public function test_post_admin_logout_redirects_to_login(): void
    {
        $admin = User::firstOrCreate(
            ['email' => 'admin_test2@jayamaju.com'],
            [
                'name' => 'Admin Tester 2',
                'password' => bcrypt('password123'),
                'role' => 'admin',
                'is_admin' => true,
            ]
        );

        $response = $this->actingAs($admin)->post('/admin/logout');

        $response->assertRedirect(route('admin.login'));
        $this->assertGuest();
    }

    public function test_cart_clear_get_works(): void
    {
        $response = $this->get(route('cart.clear'));
        $response->assertRedirect(route('cart'));
    }

    public function test_compare_clear_get_works(): void
    {
        $response = $this->get(route('compare.clear'));
        $response->assertStatus(302);
    }
}
