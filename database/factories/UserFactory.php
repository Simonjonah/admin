<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $passwordHash = Hash::make('secret');
        $rememberToken = Str::random(10);
        //$user = \App\Models\User::pluck('id')->all();
        
        return [
        'name' => $this->faker->name,
        'user_id' =>$this->faker->random(),
        'email' => $this->faker->email,
        'role_id' => $this->faker->numberBetween(1,5),
        'email_verified_at' => $this->faker->date('Y-m-d H:i:s'),
        'password' => $passwordHash,
        'remember_token' => $rememberToken,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
        // return [
        //     'name' => $this->faker->word,
        // 'email' => $this->faker->word,
        // 'role_id' => $this->faker->word,
        // 'email_verified_at' => $this->faker->date('Y-m-d H:i:s'),
        // 'password' => $this->faker->word,
        // 'remember_token' => $this->faker->word,
        // 'created_at' => $this->faker->date('Y-m-d H:i:s'),
        // 'updated_at' => $this->faker->date('Y-m-d H:i:s')
        // ];
    }
}
