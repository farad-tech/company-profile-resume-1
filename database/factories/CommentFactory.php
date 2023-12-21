<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition(): array
  {
    $email = [
      null,
      fake()->email,
    ];

    $website = [
      null,
      fake()->url,
    ];
    return [
      'name' => fake()->name,
      'email' => $email[rand(0, 1)],
      'website' => $website[rand(0, 1)],
      'comment' => fake()->words(rand(10, 300), true),
      'App\Models\Blog' => rand(1,30),
      'confirmed' => rand(0,1),
    ];
  }
}
