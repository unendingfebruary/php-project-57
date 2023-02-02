<?php

namespace Tests\Feature;

use App\Models\Label;
use App\Models\Task;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LabelControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testLabelIndexPageIsDisplayed()
    {
        $response = $this->get(route('labels.index'));
        $response->assertOk();
    }

    public function testLabelCreatePageIsDisplayedOnlyForAuthorizedUsers()
    {
        $user = User::factory()->create();
        $route = route('labels.create');

        $response = $this->get($route);
        $response->assertForbidden();

        $response = $this
            ->actingAs($user)
            ->get($route);
        $response->assertOk();
    }

    public function testLabelCanBeCreated()
    {
        $user = User::factory()->create();
        $labelData = Label::factory()->make()->only('name', 'description');

        $response = $this
            ->actingAs($user)
            ->post(route('labels.store'), $labelData);

        $response->assertRedirect(route('labels.index'));
        $this->assertDatabaseHas('labels', $labelData);
    }

    public function testLabelEditPageIsDisplayedOnlyForAuthorizedUsers()
    {
        $user = User::factory()->create();
        $label = Label::factory()->create();
        $route = route('labels.edit', $label);

        $response = $this->get($route);
        $response->assertForbidden();

        $response = $this
            ->actingAs($user)
            ->get($route);
        $response->assertOk();
    }

    public function testLabelCanBeUpdated()
    {
        $user = User::factory()->create();
        $label = Label::factory()->create();
        $labelUpdateData = Label::factory()->make()->only('name', 'description');

        $response = $this
            ->actingAs($user)
            ->patch(route('labels.update', $label), $labelUpdateData);

        $response->assertRedirect(route('labels.index'));
        $this->assertDatabaseHas('labels', $labelUpdateData);
    }

    public function testLabelCanBeDeletedIfNoTasks()
    {
        $user = User::factory()->create();
        $label = Label::factory()->create();

        $response = $this
            ->actingAs($user)
            ->delete(route('labels.destroy', $label));

        $response->assertRedirect(route('labels.index'));
        $this->assertDatabaseMissing('labels', $label->only('id'));

        $label2 = Label::factory()
            ->has(Task::factory()->count(1))
            ->create();

        $response2 = $this
            ->actingAs($user)
            ->delete(route('labels.destroy', $label2));

        $response2->assertRedirect(route('labels.index'));
        $this->assertDatabaseHas('labels', $label2->only('id'));
    }
}
