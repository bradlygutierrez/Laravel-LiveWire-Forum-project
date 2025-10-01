<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog>
 */
class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(),
            'content' => json_encode($this->generateContentBlocks()), // generate as JSON string
        ];
    }

    private function generateContentBlocks(): array
    {
        $blocks = [];

        // Add 2–4 paragraph blocks
        $paragraphCount = $this->faker->numberBetween(2, 4);
        for ($i = 0; $i < $paragraphCount; $i++) {
            $blocks[] = [
                'type' => 'paragraph',
                'text' => $this->faker->paragraphs($this->faker->numberBetween(1, 3), true),
            ];
        }

        // Add 1–2 image blocks optionally
        $imageCount = $this->faker->numberBetween(1, 2);
        for ($i = 0; $i < $imageCount; $i++) {
            $blocks[] = [
                'type' => 'image',
                'src' => 'https://picsum.photos/seed/' . $this->faker->unique()->numberBetween(1000, 9999) . '/800/400',
            ];
        }

        // Optional: Shuffle blocks so paragraphs and images mix randomly
        shuffle($blocks);

        return $blocks;
    }
}
