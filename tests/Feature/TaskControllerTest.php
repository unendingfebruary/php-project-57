<?php

namespace Tests\Feature;

use App\Models\Task;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TaskControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_task_index_page_is_displayed()
    {
        $response = $this->get(route('tasks.index'));
        $response->assertOk();
    }

    public function test_task_create_page_is_displayed_only_for_authorized_users()
    {
        $user = User::factory()->create();
        $route = route('tasks.create');

        $response = $this->get($route);
        $response->assertForbidden();

        $response = $this
            ->actingAs($user)
            ->get($route);
        $response->assertOk();
    }

    public function test_task_can_be_created()
    {
        $user = User::factory()->create();
        $taskData = Task::factory()->make()->only('name', 'status_id');

        $response = $this
            ->actingAs($user)
            ->post(route('tasks.store'), $taskData);

        $response->assertRedirect(route('tasks.index'));
        $this->assertDatabaseHas('tasks', $taskData);
    }

    public function test_task_show_page_is_displayed()
    {
        $task = Task::factory()->create();
        $response = $this->get(route('tasks.show', $task));
        $response->assertOk();
    }

    public function test_status_edit_page_is_displayed_only_for_authorized_users()
    {
        $user = User::factory()->create();
        $task = Task::factory()->create();
        $route = route('tasks.edit', $task);

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
        $task = Task::factory()->create();
        $taskUpdateData = Task::factory()->make()->only('name', 'status_id');

        $response = $this
            ->actingAs($user)
            ->patch(route('tasks.update', $task), $taskUpdateData);

        $response->assertRedirect(route('tasks.index'));
        $this->assertDatabaseHas('tasks', $taskUpdateData);
    }

    public function test_task_can_be_deleted_only_by_creator()
    {
        $user = User::factory()->create();
        $task = Task::factory()->create();
        $creator = User::find($task->created_by_id);

        $response = $this
            ->actingAs($user)
            ->delete(route('tasks.destroy', $task));

        $response->assertForbidden();

        $response = $this
            ->actingAs($creator)
            ->delete(route('tasks.destroy', $task));

        $response->assertRedirect(route('tasks.index'));
        $this->assertDatabaseMissing('tasks', $task->only('id'));

    }
}
