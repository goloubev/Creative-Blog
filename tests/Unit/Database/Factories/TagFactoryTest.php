<?php

namespace Tests\Unit\Database\Factories;

use PHPUnit\Framework\TestCase;
use Database\Factories\TagFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TagFactoryTest extends TestCase
{
    use RefreshDatabase;

    public TagFactory $factory;

    protected function setUp(): void
    {
        parent::setUp();

        $this->factory = TagFactory::new();
    }

    public function testTagFactory()
    {
        // Generate attributes
        $attributes = $this->factory->definition();

        // Check generated attributes
        $this->assertArrayHasKey('title', $attributes);
    }
}
