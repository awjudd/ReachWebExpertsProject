<?php

namespace Tests\Feature\superadmin;

use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use App\User;
use App\Admin;
use App\SuperAdmin;
use App\SuperAdminProfile;

class EditProfilePageTest extends TestCase
{
    use DatabaseTransactions;
    use WithoutMiddleware;
    
    /** @test **/
    public function super_admin_can_see_prefilled_form_details()
    {
        $this->refreshApplication();

        $superadmin = SuperAdmin::find(1);
        $profile = SuperAdminProfile::find(1);

        $response = $this->actingAs($superadmin, 'superadmin')
            ->get('admin/profile/edit')
            ->assertStatus(200)
            ->assertSee($superadmin->name)
            ->assertSee($superadmin->email)
            ->assertSee($profile->description);
    }

    /** @test **/
    public function user_cannot_access_page()
    {
        $this->refreshApplication();

        $user = User::find(1);

        $response = $this->actingAs($user)
            ->get('admin/profile/edit')
            ->assertStatus(302);
    }

    /** @test **/
    public function guest_cannot_access_page()
    {
        $this->refreshApplication();

        $response = $this->get('admin/profile/edit')
            ->assertStatus(302);
    }

    /** @test **/
    public function admin_cannot_access_page()
    {
        $this->refreshApplication();

        $admin = Admin::find(1);

        $response = $this->actingAs($admin)
            ->get('admin/profile/edit')
            ->assertStatus(302);
    }
}
