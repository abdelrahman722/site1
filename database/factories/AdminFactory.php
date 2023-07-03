<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Setting>
 */
class AdminFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'namd' => 'Admin',
            'email' => 'admin@admin.com',
            //123456
            'password' => '$2y$10$WZiItTAYXXh/iTvVfnFP4ekEzCUMTRDUNctuvm6KESpaDhx3uiEye',
            'role' => true
        ];
    }
}
