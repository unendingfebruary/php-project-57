<?php

namespace Tests\Feature;

use App\Models\Task;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TaskControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testTaskIndexPageIsDisplayed()
    {
        $response = $this->get(route('tasks.index'));
        $response->assertOk();
    }

    public function testTaskCreatePageIsDisplayedOnlyForAuthorizedUsers()
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

    public function testTaskCanBeCreated()
    {
        $user = User::factory()->create();
        $taskData = Task::factory()->make()->only('name', 'status_id');

        $response = $this
            ->actingAs($user)
            ->post(route('tasks.store'), $taskData);

        $response->assertRedirect(route('tasks.index'));
        $this->assertDatabaseHas('tasks', $taskData);
    }

    public function testTaskShowPageIsDisplayed()
    {
        $task = Task::factory()->create();
        $response = $this->get(route('tasks.show', $task));
        $response->assertOk();
    }

    public function testStatusEditPageIsDisplayedOnlyForAuthorizedUsers()
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

    public function testStatusCanBeUpdated()
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

    public function testTaskCanBeDeletedOnlyByCreator()
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
