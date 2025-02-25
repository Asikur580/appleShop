<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    protected static array $categories = [
        'Electronics',
        'Fashion',
        'Home & Kitchen',
        'Beauty & Personal Care',
        'Sports & Outdoors',
        'Automotive',
        'Toys & Games',
        'Books',
        'Health & Wellness',
        'Office Supplies',
        'Pet Supplies',
        'Grocery'
    ];

    public function definition(): array
    {
        return [
            'categoryName' => $this->faker->unique()->randomElement(self::$categories),
            'categoryImg' => $this->faker->imageUrl(200, 200, 'categories'),
        ];
    }
}
