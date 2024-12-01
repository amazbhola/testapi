<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tender>
 */
class TenderFactory extends Factory
{
    protected $model = \App\Models\Tender::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'tender_id' => $this->faker->uuid,
            'description' => $this->faker->sentence,
            'document_price' => $this->faker->randomFloat(2, 100, 1000),
            'tender_security' => $this->faker->randomFloat(2, 1000, 10000),
            'last_sale_date' => $this->faker->date,
            'opening_date' => $this->faker->date,
            'closing_date' => $this->faker->date,
            'method' => $this->faker->randomElement(['LTM', 'OTM', 'OSTETM', 'RFQ']),
            'tender_capacity' => $this->faker->randomFloat(2, 0, 100),
            'note' => $this->faker->sentence,
            'created_by' => 1,
            'updated_by' => 1,
            'department_id' => $this->faker->randomElement([1, 2, 3]),
            'location_id' => $this->faker->randomElement([1, 2, 3]),
        ];
    }
}
