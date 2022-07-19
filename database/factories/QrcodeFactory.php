<?php

namespace Database\Factories;

use App\Models\Qrcode;
use Illuminate\Database\Eloquent\Factories\Factory;

class QrcodeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Qrcode::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
        //     'user_id' => $this->faker->randomDigitNotNull,
        // 'qrcode_id' => $this->faker->randomDigitNotNull,
       // 'payment_method' => $this->faker->word,
        'qrcode_id' => function(){
            return \App\Models\User::all()->unique()->random();
        },
        'payment_method' => 'Flutterwave'.$this->faker->creditCardType,
        'subject' => $this->faker->word,
        'class' => $this->faker->name,
        'website' => $this->faker->url,
        'subject_url' => $this->faker->url,
        'qrcode_path' => 'qrcode/1.png',
        'amount' =>rand(1000,4000),
        'callback_url' => $this->faker->url,
        'status' => rand(0,1),
        'user_id' => function(){
            return \App\Models\User::all()->random();
        },

        'deleted_at' => $this->faker->date('Y-m-d H:i:s'),
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
