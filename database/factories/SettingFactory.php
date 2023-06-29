<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Setting>
 */
class SettingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => 'Site',
            'description1' => 'Better Solutions For Your Business',
            'description2' => 'We are team of talented designers making websites with Bootstrap',
            'address' => 'address',
            'location' => 'location',
            'phone1' => '01000000000',
            'phone2' => '01222222222',
            'phone3' => '01111111111',
            'email' => 'email@mail.caom',
            'facebook' => 'facebook.com',
            'twitter' => 'twitter.com',
            'linkedin' => 'linkedin.com',
            'skype' => 'skype.com',
        ];
    }
}
