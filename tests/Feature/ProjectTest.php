<?php

namespace Tests\Feature;

use App\Project;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProjectTest extends TestCase
{
    use DatabaseMigrations  ;

    use WithFaker, RefreshDatabase;

    public function test_user_can_create_a_project()
    {
        $this->withoutExceptionHandling();

        $this->actingAs(factory(User::class)->create());

        $attributes = factory(Project::class)->raw(['owner_id' => auth()->user()->id]);

        $this->post('/projects', $attributes)->assertRedirect('/projects');

        $this->assertDatabaseHas('projects', $attributes);

        $this->get('/projects')->assertSee($attributes['title']);
    }

    public function test_a_user_can_view_a_project()
    {
        $project = factory(Project::class)->create();

        $this->get($project->path())
            ->assertSee($project->title)
            ->assertSee($project->description);
    }

    public function test_a_project_requires_a_title()
    {
        $this->actingAs(factory(User::class)->create());

        $attributes = factory(Project::class)->raw(['title' => null]);

        $this->post('/projects', $attributes)->assertSessionHasErrors('title');
    }

    public function test_a_project_requires_a_description()
    {
        $this->actingAs(factory(User::class)->create());

        $attributes = factory(Project::class)->raw(['description' => null]);

        $this->post('/projects', $attributes)->assertSessionHasErrors('description');
    }

    public function test_a_project_requires_a_owner()
    {
        $attributes = factory(Project::class)->raw();

        $this->post('/projects', $attributes)->assertRedirect('login');
    }
}
