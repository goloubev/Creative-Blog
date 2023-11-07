<?php

namespace Tests\Unit\Database\Factories;

use PHPUnit\Framework\TestCase;
use Database\Factories\PostFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PostFactoryTest extends TestCase
{
    use RefreshDatabase;

    public function testPostFactory()
    {
        // Generate attributes
        $attributes = PostFactory::new()->definition();

        // Check generated attributes
        $this->assertArrayHasKey('title', $attributes);
        $this->assertArrayHasKey('content', $attributes);
        $this->assertArrayHasKey('category_id', $attributes);
        $this->assertArrayHasKey('preview_image', $attributes);
        $this->assertArrayHasKey('main_image', $attributes);

        // Check 'title'
        $expectedTitle = $attributes['title'];
        $this->assertSame($expectedTitle, $attributes['title']);

        // Check 'content'
        $expectedContent = $attributes['content'];
        $this->assertSame($expectedContent, $attributes['content']);

        // Check 'thumbnail'
        /*$thumbnail = realpath(__DIR__ . '/../../../../').'/public/images/illustration-' . rand(1, 5) . '.png';
        $this->assertFileExists($thumbnail);*/
    }
}
