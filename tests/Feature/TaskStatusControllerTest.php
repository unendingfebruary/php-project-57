<?php

namespace Tests\Feature;

use App\Models\TaskStatus;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TaskStatusControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_status_index_page_is_displayed()
    {
        $response = $this->get(route('task_statuses.index'));
        $response->assertOk();
    }

    public function test_status_create_page_is_displayed_only_for_authorized_users()
    {
        $user = User::factory()->create();
        $route = route('task_statuses.create');

        $response = $this->get($route);
        $response->assertForbidden();

        $response = $this
            ->actingAs($user)
            ->get($route);
        $response->assertOk();
    }

    public function test_status_can_be_created()
    {
        $user = User::factory()->create();

        $response = $this
            ->actingAs($user)
            ->post(route('task_statuses.store'), ['name' => 'new']);

        $response->assertStatus(302);
        $response->assertRedirect(route('task_statuses.index'));

        $this->assertDatabaseHas('task_statuses', [
            'name' => 'new',
        ]);
    }

    public function test_status_edit_page_is_displayed_only_for_authorized_users()
    {
        $user = User::factory()->create();
        $status = TaskStatus::factory()->create();
        $route = route('task_statuses.edit', $status);

        $response = $this->get($route);
        $response->assertForbidden();

        $response = $this
            ->actingAs($user)
            ->get($route);
        $response->assertOk();
    }

    public function test_status_can_be_updated()
    {
        $user = User::factory()->create();
        $status = TaskStatus::factory()->create();

        $response = $this
            ->actingAs($user)
            ->patch(route('task_statuses.update', $status), ['name' => 'updated']);

        $response->assertStatus(302);
        $response->assertRedirect(route('task_statuses.index'));

        $this->assertDatabaseHas('task_statuses', [
            'name' => 'updated',
        ]);
    }
}
