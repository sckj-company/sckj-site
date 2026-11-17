<?php

namespace Database\Factories;

use App\Models\ContactMessage;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<ContactMessage>
 */
class ContactMessageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nome' => fake()->name(),
            'telefone' => fake()->phoneNumber(),
            'email' => fake()->safeEmail(),
            'servico' => fake()->randomElement(array_keys(ContactMessage::SERVICOS)),
            'mensagem' => fake()->paragraph(),
            'status' => fake()->randomElement(ContactMessage::ESTADOS),
            'created_at' => fake()->dateTimeBetween('-11 months', 'now'),
        ];
    }
}
