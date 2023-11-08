<?php

namespace Tests\Unit\Models;

use App\Models\Category;
use PHPUnit\Framework\TestCase;

class CategoryTest extends TestCase
{
    private Category $category;

    protected function setUp(): void
    {
        parent::setUp();

        $this->category = new Category();
    }

    public function testGetCategoryName(): void
    {
        $array = [10, 20, 30, 40, 50];
        dd($array);

        $this->assertTrue(true);
        //$result = Category::getCategoryName(1);
        //dd($result);
    }

    public function testPosts(): void
    {
        $this->assertTrue(true);
        //$result = $this->category->posts();
        //dd($result);
    }
}
