<?php

namespace Database\Factories;

use App\Models\AccountHistory;
use Illuminate\Database\Eloquent\Factories\Factory;

class AccountHistoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = AccountHistory::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $user = \App\Models\User::pluck('id')->all();
        $account_id = \App\Models\User::pluck('id')->all();

        return [
            'user_id' =>$this->faker->randomElement($user),

            'account_id' =>$this->faker->randomElement($account_id),

        'message' => $this->faker->paragraph(2, true),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s'),
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
