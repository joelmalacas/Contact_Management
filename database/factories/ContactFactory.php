<?php

namespace Database\Factories;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Contact>
 */
class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array {

        $name = fake()->randomElement([
            'João Pedro',
            'Ana Carolina',
            'Zé Tó',
            'Patrícia Antunes',
            'Mónica Jardim',
            'João Baião'
        ]);

        return [
            'name' => $name,
            'email' => $this->faker->unique()->safeEmail(),
            'contact' => '9' . fake()->numerify('########')
        ];
    }
}
