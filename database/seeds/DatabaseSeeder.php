<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    	// DB::table('admin')->insert([
        //     'name' => "admin",
        //     'email' => 'admin@testing.tst',
        //     'password' => bcrypt('secret'),
        //     'phone' => "7039349983",
        //     'address' => "Mumbai",
        //     'status' => "active",
        //     'remember_token' => str_random(10)
       	// ]);
        // DB::table('j_type')->truncate();
    	// DB::table('j_type')->insert([
        //     [ 'name' => "Silver", 'price'=> 10000, 'making_charge'=> 200, 'created_at' => now()],
        //     [ 'name' => "Gold", 'price'=> 100000, 'making_charge'=> 500, 'created_at' => now()],
        //     [ 'name' => "Platinum", 'price'=> 1000000, 'making_charge'=> 1000, 'created_at' => now()],
        // ]);
        DB::table('gcash_option')->truncate();
    	DB::table('gcash_option')->insert([
            [ 'id' => 3, 'name' => "Diwali Offer", 'type'=> 'flat', 'discount'=> 500, 'discount_type' => 'flat', 'upto' => 1, 'status' => 'active', 'created_at' => now()],
        ]);
        DB::table('installment_detail')->truncate();
        DB::table('installment_detail')->insert([
            [
                'name' => 'Small',
                'tenure' => 12,
                'locking_period' => 6,
                'down_payment' => 5 ,
                'delay_fine' => 100,
                'status' => 'active',
                'created_at' => now()
            ],
            [
                'name' => 'Medium',
                'tenure' => 34,
                'locking_period' => 12,
                'down_payment' => 10 ,
                'delay_fine' => 100,
                'status' => 'active',
                'created_at' => now()
            ],
            [
                'name' => 'Small',
                'tenure' => 36,
                'locking_period' => 18,
                'down_payment' => 15 ,
                'delay_fine' => 100,
                'status' => 'active',
                'created_at' => now()
            ],
        ]);
    }
}
        // $this->call(UsersTableSeeder::class);