<?php

namespace Database\Factories;

use App\Models\Secondvideo;
use Illuminate\Database\Eloquent\Factories\Factory;

class SecondvideoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Secondvideo::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->randomDigitNotNull,
        'subject_id' => $this->faker->randomDigitNotNull,
        'subject_count' => $this->faker->randomDigitNotNull,
        'class' => $this->faker->word,
        'subject' => $this->faker->word,
        'video' => $this->faker->word,
        'photo' => $this->faker->word,
        'amount' => $this->faker->randomDigitNotNull,
        'deleted_at' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
