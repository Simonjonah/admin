<?php

namespace Database\Factories;

use App\Models\Account;
use App\Models\Flutterwave;
use Arr;
use Illuminate\Database\Eloquent\Factories\Factory;

class AccountFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Account::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $payment_method = array('Paystack', 'Flutterwave', 'stripe', 'bank', 'paypal');
        return [
            'user_id' => function(){
                return \App\Models\User::all()->random();
              },
        'balance' => $this->faker->numberBetween(2000, 4000),
        'total_credit' => $this->faker->numberBetween(2000, 4000),
        'total_debit' => $this->faker->numberBetween(2000, 4000),
        'withdrawal_method' => $payment_method[rand(1,2)],
        'payment_email' => $this->faker->email,
        'bank_name' => $this->faker->name,
        'bank_branch' => $this->faker->name,
        'bank_account' => $this->faker->bankAccountNumber,
        'applied_for_payout' => $this->faker->numberBetween(0, 1),
        'paid' => $this->faker->numberBetween(2000, 4000),
        'country' => $this->faker->country,
        'other_details' => $this->faker->paragraph(4, true),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s'),
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
