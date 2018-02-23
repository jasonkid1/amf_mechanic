<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        // $this->call(UsersTableSeeder::class);
        DB::table('users')->insert([
            'name' => 'VehicleOwner',
            'email' => 'user@mec.com',
            'password' => bcrypt('password'),
            'remember_token' => str_random(10),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        // check if table mechanics is empty
        if(DB::table('mechanics')->get()->count() == 0){

            DB::table('mechanics')->insert([

                [
                    'name' => 'Mechanic 1',
                    'email' => 'mechanic.one@mec.com',
                    'address' => 'Blk 23 Lot 45 Pearl St. Citihomes Molino 4, Bacoor Cavite',
                    'zipcode' => '4102',
                    'status' => '1',
                    'verified' => '1',
                    'password' => bcrypt('password'),
                    'remember_token' => str_random(10),
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Mechanic 2',
                    'email' => 'mechanic.two@mec.com',
                    'address' => 'Blk 1 Lot 21 Kamias St. Barangay Fairgrounds Molino 4, Bacoor Cavite',
                    'zipcode' => '4102',
                    'status' => Null,
                    'verified' => '1',
                    'password' => bcrypt('password'),
                    'remember_token' => str_random(10),
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                 
                [
                    'name' => 'Mechanic 3',
                    'email' => 'mechanic.three@mec.com',
                    'address' => 'Blk 22 Lot 56 Mabuhay St. Country Homes Molino 4, Bacoor Cavite',
                    'zipcode' => '4102',
                    'status' => '1',
                    'verified' => '1',
                    'password' => bcrypt('password'),
                    'remember_token' => str_random(10),
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],

                [
                    'name' => 'Mechanic 4',
                    'email' => 'mechanic.four@mec.com',
                    'address' => 'Blk 45 Lot 1 Maytama St. Barangay Habol Molino 4, Bacoor Cavite',
                    'zipcode' => '4102',
                    'status' => Null,
                    'verified' => '1',
                    'password' => bcrypt('password'),
                    'remember_token' => str_random(10),
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                 [
                    'name' => 'Mechanic 5',
                    'email' => 'mechanic.five@mec.com',
                    'address' => 'Blk 34 Lot 49 Lavander St. Barangay Vallejo Molino 4, Bacoor Cavite',
                    'zipcode' => '4102',
                    'status' => Null,
                    'verified' => '1',
                    'password' => bcrypt('password'),
                    'remember_token' => str_random(10),
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],

                [
                    'name' => 'Mechanic Six',
                    'email' => 'mechanic.six@mec.com',
                    'address' => 'Blk 9 Lot 20 Primero St. Barangay Sibol Molino 4, Bacoor Cavite',
                    'zipcode' => '4102',
                    'status' => Null,
                    'verified' => '1',
                    'password' => bcrypt('password'),
                    'remember_token' => str_random(10),
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],


                [
                    'name' => 'Mechanic 7',
                    'email' => 'mechanic.seven@mec.com',
                    'address' => 'Blk 12 Lot 33 Kinchay St. Barangay Firenze Molino 4, Bacoor Cavite',
                    'zipcode' => '4102',
                    'status' => Null,
                    'verified' => '1',
                    'password' => bcrypt('password'),
                    'remember_token' => str_random(10),
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],



                [
                    'name' => 'Mechanic 8',
                    'email' => 'mechanic.eight@mec.com',
                    'address' => 'Blk 44 Lot 45 Kenon St. Barangay La Joya Molino 4, Bacoor Cavite',
                    'zipcode' => '4102',
                    'status' => Null,
                    'verified' => '1',
                    'password' => bcrypt('password'),
                    'remember_token' => str_random(10),
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],

                [
                    'name' => 'Mechanic 9',
                    'email' => 'mechanic.nine@mec.com',
                    'address' => 'Blk 44 Lot 22 Mayon St. Lipat Molino 4, Bacoor Cavite',
                    'zipcode' => '4102',
                    'status' => '1',
                    'verified' => '1',
                    'password' => bcrypt('password'),
                    'remember_token' => str_random(10),
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],

                [
                    'name' => 'Mechanic 10',
                    'email' => 'mechanic.ten@mec.com',
                    'address' => 'Blk 20 Lot 32 Apo St. BNT Molino 4, Bacoor Cavite',
                    'zipcode' => '4102',
                    'status' => '1',
                    'verified' => '1',
                    'password' => bcrypt('password'),
                    'remember_token' => str_random(10),
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],

                [
                    'name' => 'Mechanic 11',
                    'email' => 'mechanic.eleven@mec.com',
                    'address' => 'Blk 51 Lot 28 Bucandala St. Town & Country Molino 4, Bacoor Cavite',
                    'zipcode' => '4102',
                    'status' => '1',
                    'verified' => '1',
                    'password' => bcrypt('password'),
                    'remember_token' => str_random(10),
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],

                [
                    'name' => 'Mechanic 12',
                    'email' => 'mechanic.twelve@mec.com',
                    'address' => 'Blk 23 Lot 45 Pearl St. Citihomes Molino 4, Bacoor Cavite',
                    'zipcode' => '4102',
                    'status' => '1',
                    'verified' => '1',
                    'password' => bcrypt('password'),
                    'remember_token' => str_random(10),
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ]

            ]);

        } else { echo "\e[31mTable is not empty, therefore NOT "; }
        
    }
}
