<?php

namespace Tests\Unit\Database\Factories;

use PHPUnit\Framework\TestCase;
use Database\Factories\CategoryFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CategoryFactoryTest extends TestCase
{
    use RefreshDatabase;

    public function testCategoryFactory()
    {
        // Generate attributes
        $attributes = CategoryFactory::new()->definition();

        // Check generated attributes
        $this->assertArrayHasKey('title', $attributes);
    }
}
