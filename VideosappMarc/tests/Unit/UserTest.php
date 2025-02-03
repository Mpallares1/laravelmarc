<?php

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_checks_if_user_is_super_admin()
    {
        // Crear un usuario con el atributo super_admin establecido en true
        $superAdmin = User::factory()->create(['super_admin' => true]);

        // Verificar que el método isSuperAdmin() devuelve true
        $this->assertTrue($superAdmin->isSuperAdmin());

        // Crear un usuario con el atributo super_admin establecido en false
        $regularUser = User::factory()->create(['super_admin' => false]);

        // Verificar que el método isSuperAdmin() devuelve false
        $this->assertFalse($regularUser->isSuperAdmin());
    }
}
