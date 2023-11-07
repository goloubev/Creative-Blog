<?php

namespace Tests\Unit\Database\Factories;

use PHPUnit\Framework\TestCase;
use Database\Factories\CategoryFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CategoryFactoryTest extends TestCase
{
    use RefreshDatabase;

    public CategoryFactory $factory;

    protected function setUp(): void
    {
        parent::setUp();

        $this->factory = CategoryFactory::new();
    }

    public function testCategoryFactory()
    {
        // Generate attributes
        $attributes = $this->factory->definition();

        // Check generated attributes
        $this->assertArrayHasKey('title', $attributes);
    }
}
