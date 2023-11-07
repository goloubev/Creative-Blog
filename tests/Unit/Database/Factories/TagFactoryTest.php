<?php

namespace Tests\Unit\Database\Factories;

use PHPUnit\Framework\TestCase;
use Database\Factories\TagFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TagFactoryTest extends TestCase
{
    use RefreshDatabase;

    public function test_example(): void
    {
        // Generate attributes
        $attributes = TagFactory::new()->definition();

        // Check generated attributes
        $this->assertArrayHasKey('title', $attributes);
    }
}
