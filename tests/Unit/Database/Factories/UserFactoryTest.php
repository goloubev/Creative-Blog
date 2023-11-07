<?php

namespace Tests\Unit\Database\Factories;

use PHPUnit\Framework\TestCase;
use Database\Factories\UserFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserFactoryTest extends TestCase
{
    use RefreshDatabase;

    public function testUserFactory()
    {
        $factory = UserFactory::new();

        // Generate attributes
        $attributes = $factory->definition();

        // Check generated attributes
        $this->assertArrayHasKey('name', $attributes);
        $this->assertArrayHasKey('email', $attributes);
        $this->assertArrayHasKey('role', $attributes);
        $this->assertArrayHasKey('email_verified_at', $attributes);
        $this->assertArrayHasKey('password', $attributes);
        $this->assertArrayHasKey('remember_token', $attributes);

        // Check 'name'
        $expectedName = $attributes['name'];
        $this->assertSame($expectedName, $attributes['name']);

        // Check 'email'
        $expectedEmail = $attributes['email'];
        $this->assertSame($expectedEmail, $attributes['email']);
    }
}
