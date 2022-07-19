<?php

namespace Database\Factories;

use App\Models\Transaction;
use Illuminate\Database\Eloquent\Factories\Factory;




class TransactionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Transaction::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(){
        
       
      $status = array('completed', 'initiated', 'failed');
      $user = \App\Models\User::pluck('id')->all();
      $owner_qrcode_id = \App\Models\User::pluck('id')->all();
      $qrcode_id = \App\Models\User::pluck('id')->all();
      $transaction_id = \App\Models\User::pluck('id')->all();
      
    
        return [
            
        'payment_method' => 'Flutterwave'.$this->faker->creditCardType,
        'user_id' =>$this->faker->randomElement($user),
        'owner_qrcode_id' =>$this->faker->randomElement($owner_qrcode_id),
        'qrcode_id'=>$this->faker->randomElement($qrcode_id),
        'transaction_id'=>$this->faker->randomElement($transaction_id),

        'message' =>$this->faker->text,
        'amount' =>$this->faker->numberBetween(2000, 4000),
        'qrcode_url' => $this->faker->url,
        'status' => $status[rand(0,1)],
        'deleted_at' => $this->faker->date('Y-m-d H:i:s'),
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
