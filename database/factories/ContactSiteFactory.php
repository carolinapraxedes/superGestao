<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ContactSite>
 */
class ContactSiteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name'=>fake()->name,
            'phoneNumber'=>fake()->tollFreePhoneNumber,
            'email'=>fake()->unique()->email,
            'reasonContact'=>fake()->numberBetween(1,3),
            'message'=>fake()->text(200)
        ];
    }
}
