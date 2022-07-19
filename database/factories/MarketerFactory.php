<?php

namespace Database\Factories;

use App\Models\Marketer;
use Illuminate\Database\Eloquent\Factories\Factory;

class MarketerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Marketer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->word,
        'affiliate_id' => $this->faker->randomDigitNotNull,
        'marketer_id' => $this->faker->word,
        'firstname' => $this->faker->word,
        'lastname' => $this->faker->word,
        'email' => $this->faker->word,
        'phone' => $this->faker->word,
        'email_verified_at' => $this->faker->date('Y-m-d H:i:s'),
        'affiliate_code' => $this->faker->word,
        'marketer_count' => $this->faker->randomDigitNotNull,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
