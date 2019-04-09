<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AdminTest extends TestCase
{
    use RefreshDatabase;
    /**
     * Test if route dashboard is returning 200 code (success) for normal user (should be 302)
     *
     * @return void
     */
    public function test_if_is_not_working_for_normal_user()
    {
        $response = $this->get(route('dashboard'));

        $response->assertStatus(302);
    }
    /**
     * Test if route dashboard is returning 200 code (success) for admin user
     *
     * @return void
     */
    public function test_if_is__working_for_admin_user()
    {

        $user = factory(\App\User::class)->create([
            'admin'=>'true',
        ]);
        $response = $this->actingAs($user)->get(route('dashboard'));

        $response->assertStatus(200);
    }

    /**
     * Test if route user_form is returning 200 code (success) for admin user
     *
     * @return void
     */
    public function test_if_page_userform_is_working()
    {

        $user = factory(\App\User::class)->create([
            'admin'=>'true',
        ]);
        $response = $this->actingAs($user)->get(route('admin.user_form'));

        $response->assertStatus(200);
    }
    /**
     * Test if route dashboard is returning 200 code (success) for normal user
     *
     * @return void
     */
    public function test_if_page_userform_is_working_for_normal_user()
    {

        $user = factory(\App\User::class)->create([
            'admin'=>'false',
        ]);
        $response = $this->actingAs($user)->get(route('admin.user_form'));

        $response->assertStatus(302);
    }
}
