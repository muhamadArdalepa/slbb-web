<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $fname = fake()->firstName();
        $lname = fake()->lastName();
        $number = random_int(0,99);
        return [
            'name' => $fname.' '.$lname,
            'role' => random_int(0,3),
            'username' => strtolower($fname.$lname.$number),
            'email' => strtolower($fname.$lname.$number).'@gmail.com',
            'picture' => 'https://dummyimage.com/500x600/b3b3b3/ffffff',
            'nimp' => fake()->numerify('################'),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
