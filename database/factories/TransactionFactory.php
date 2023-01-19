<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'reference_no' => 'DT' . Str::upper(uniqid()),
            'price' => '5000',
            'quantity' => mt_rand(1, 5),
            'payment_amount' => '10000',
            'product_id' => mt_rand(1, 30),

        ];
    }
}
