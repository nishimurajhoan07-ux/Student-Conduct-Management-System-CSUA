<?php

namespace Tests\Feature;

use App\Livewire\Admin\UserManagement;
use App\Models\IncidentReport;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class UserManagementDeleteTest extends TestCase
{
    use RefreshDatabase;

    private User $admin;

    protected function setUp(): void
    {
        parent::setUp();

        Role::firstOrCreate(['name' => 'administrator']);
        Role::firstOrCreate(['name' => 'staff']);
        Role::firstOrCreate(['name' => 'student']);

        $this->admin = User::factory()->create();
        $this->admin->assignRole('administrator');
    }

    public function test_admin_can_delete_user_with_no_incident_reports(): void
    {
        $user = User::factory()->create();

        Livewire::actingAs($this->admin)
            ->test(UserManagement::class)
            ->call('deleteUser', $user->id);

        $this->assertDatabaseMissing('users', ['id' => $user->id]);
    }

    public function test_delete_is_blocked_when_user_is_student_in_incident_report(): void
    {
        $student = User::factory()->create();
        $reporter = User::factory()->create();

        IncidentReport::factory()->create([
            'student_id' => $student->id,
            'reporter_id' => $reporter->id,
        ]);

        Livewire::actingAs($this->admin)
            ->test(UserManagement::class)
            ->call('deleteUser', $student->id);

        $this->assertDatabaseHas('users', ['id' => $student->id]);
    }

    public function test_delete_is_blocked_when_user_is_reporter_in_incident_report(): void
    {
        $student = User::factory()->create();
        $reporter = User::factory()->create();

        IncidentReport::factory()->create([
            'student_id' => $student->id,
            'reporter_id' => $reporter->id,
        ]);

        Livewire::actingAs($this->admin)
            ->test(UserManagement::class)
            ->call('deleteUser', $reporter->id);

        $this->assertDatabaseHas('users', ['id' => $reporter->id]);
    }

    public function test_admin_cannot_delete_own_account(): void
    {
        Livewire::actingAs($this->admin)
            ->test(UserManagement::class)
            ->call('deleteUser', $this->admin->id);

        $this->assertDatabaseHas('users', ['id' => $this->admin->id]);
    }
}
