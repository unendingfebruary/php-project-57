<?php

namespace Tests\Feature;

use App\Models\Task;
use App\Models\TaskStatus;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TaskStatusControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testStatusIndexPageIsDisplayed()
    {
        $response = $this->get(route('task_statuses.index'));
        $response->assertOk();
    }

    public function testStatusCreatePageIsDisplayedOnlyForAuthorizedUsers()
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

    public function testStatusCanBeCreated()
    {
        $user = User::factory()->create();
        $statusData = TaskStatus::factory()->make()->only('name');

        $response = $this
            ->actingAs($user)
            ->post(route('task_statuses.store'), $statusData);

        $response->assertRedirect(route('task_statuses.index'));
        $this->assertDatabaseHas('task_statuses', $statusData);
    }

    public function testStatusEditPageIsDisplayedOnlyForAuthorizedUsers()
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

    public function testStatusCanBeUpdated()
    {
        $user = User::factory()->create();
        $status = TaskStatus::factory()->create();
        $statusUpdateData = TaskStatus::factory()->make()->only('name');

        $response = $this
            ->actingAs($user)
            ->patch(route('task_statuses.update', $status), $statusUpdateData);

        $response->assertRedirect(route('task_statuses.index'));
        $this->assertDatabaseHas('task_statuses', $statusUpdateData);
    }

    public function testStatusCanBeDeletedIfNoTasks()
    {
        $user = User::factory()->create();
        $status = TaskStatus::factory()->create();

        $response = $this
            ->actingAs($user)
            ->delete(route('task_statuses.destroy', $status));

        $response->assertRedirect(route('task_statuses.index'));
        $this->assertDatabaseMissing('task_statuses', $status->only('id'));

        $status2 = TaskStatus::factory()
            ->has(Task::factory()->count(1))
            ->create();

        $response2 = $this
            ->actingAs($user)
            ->delete(route('task_statuses.destroy', $status2));

        $response2->assertRedirect(route('task_statuses.index'));
        $this->assertDatabaseHas('task_statuses', $status2->only('id'));
    }
}
