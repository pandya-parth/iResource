<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@iresource.com',
            'role' => 'admin',
            'password' => Hash::make('admin2018'),
            'active' => '1',
            'created_at' => '2018-07-16 05:48:24',
            'updated_at' => '2018-07-16 05:48:24',
        ]);

        DB::table('users')->insert([
            'name' => 'Hr',
            'email' => 'employee@iresource.com',
            'role' => 'employee',
            'password' => Hash::make('admin2018'),
            'active' => '1',
            'created_at' => '2018-07-16 05:48:24',
            'updated_at' => '2018-07-16 05:48:24',
        ]);

        DB::table('users')->insert([
            'department_id' => 1,
            'name' => 'Krupa',
            'email' => 'krupa@gmail.com',
            'last_name' => 'Chawda',
            'role' => 'interviewer',
            'password' => Hash::make('admin2018'),
            'profile_photo' => '',
            'gender' => 'female',
            'age' => '25',
            'dob' => '2018-07-16 05:48:24',
            'address' => 'Gandhinagar',
            'city' => 'Gandhinagar',
            'state' => 'Gujarat',
            'country' => 'India',
            'time_zone' => 'Asia/Kolkata',
            'phone' => '9988776655',
            'pincode' => '028',
            'mobile' => '9988776655',
            'active'=> 0,
            'file' => '',
            'date_of_today' => '2018-07-16 05:48:24',
            'post_applied' => 'PHP',
            'reference' => '',
            'notice_period' => '1 month',
            'nationality' => 'indian',
            'blood_group' => 'o',
            'expected_ctc' => '10000',
            'current_ctc' => '8000',
            'res_address' => 'New nehru hall, Gandhinagar',
            'per_address' => 'New nehru hall, Gandhinagar',
            'marital_status' => 'married',
            'active' => '1',
            'created_at' => '2018-07-16 05:48:24',
            'updated_at' => '2018-07-16 05:48:24',
        ]);

        // DB::table('users')->insert([
        //     'department_id' => 2,
        //     'name' => 'Nisha',
        //     'email' => 'nisha@gmail.com',
        //     'last_name' => 'Patel',
        //     'role' => 'interviewer',
        //     'password' => Hash::make('interviewer2018'),
        //     'profile_photo' => '',
        //     'gender' => 'female',
        //     'age' => '25',
        //     'dob' => '2018-07-16 05:48:24',
        //     'address' => 'Jamnagar',
        //     'city' => 'Jamnagar',
        //     'state' => 'Gujarat',
        //     'country' => 'India',
        //     'time_zone' => 'Asia/Kolkata',
        //     'phone' => '9988776655',
        //     'pincode' => '028',
        //     'mobile' => '9988776655',
        //     'active'=> 0,
        //     'file' => '',
        //     'date_of_today' => '2018-07-16 05:48:24',
        //     'post_applied' => 'PHP',
        //     'reference' => '',
        //     'notice_period' => '1 month',
        //     'nationality' => 'indian',
        //     'blood_group' => 'o',
        //     'expected_ctc' => '10000',
        //     'current_ctc' => '8000',
        //     'res_address' => 'New nehru hall, Jamnagar',
        //     'per_address' => 'New nehru hall, Jamnagar',
        //     'marital_status' => 'married',
        //     'active' => '1',
        //     'created_at' => '2018-07-16 05:48:24',
        //     'updated_at' => '2018-07-16 05:48:24',
        // ]);
    }
}
