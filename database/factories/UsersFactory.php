<?php

namespace Database\Factories;

use App\Models\Users;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Users::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $passwordHash = Hash::make('secret');
        $rememberToken = Str::random(10);
        $user = \App\Models\User::pluck('id')->all();

        return [
        'name' => $this->faker->name,
        'user_id' =>$this->faker->randomElement($user),
        'email' => $this->faker->unique()->safeEmail,
        'role_id' => $this->faker->numberBetween(1,4),
        'email_verified_at' => $this->faker->date('Y-m-d H:i:s'),
        'password' => $this->faker->$passwordHash,
        'remember_token' => $this->faker->$rememberToken,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
