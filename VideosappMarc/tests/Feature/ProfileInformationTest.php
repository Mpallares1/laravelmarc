<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Jetstream\Http\Livewire\UpdateProfileInformationForm;
use Livewire\Livewire;
use Tests\TestCase;

class ProfileInformationTest extends TestCase {
    use RefreshDatabase;

    public function test_current_profile_information_is_available(): void
    {
        $this->actingAs($user = User::factory()->create());

        $component = Livewire::test(UpdateProfileInformationForm::class);

        $component->assertSet('state.name', $user->name);
        $component->assertSet('state.email', $user->email);
    }

    public function test_profile_information_can_be_updated(): void
    {
        $this->actingAs($user = User::factory()->create());

        Livewire::test(UpdateProfileInformationForm::class)
            ->set('state.name', 'Test Name')
            ->set('state.email', 'test@example.com')
            ->call('updateProfileInformation');

        $this->assertEquals('Test Name', $user->fresh()->name);
        $this->assertEquals('test@example.com', $user->fresh()->email);
    }

    public function test_profile_information_update_requires_valid_email(): void
    {
        $this->actingAs($user = User::factory()->create());

        Livewire::test(UpdateProfileInformationForm::class)
            ->set('state.name', 'Test Name')
            ->set('state.email', 'invalid-email')
            ->call('updateProfileInformation')
            ->assertHasErrors(['state.email' => 'email']);
    }

    public function test_profile_information_update_requires_unique_email(): void
    {
        $this->actingAs($user = User::factory()->create());
        $otherUser = User::factory()->create(['email' => 'existing@example.com']);

        Livewire::test(UpdateProfileInformationForm::class)
            ->set('state.name', 'Test Name')
            ->set('state.email', 'existing@example.com')
            ->call('updateProfileInformation')
            ->assertHasErrors(['state.email' => 'unique']);
    }
}
