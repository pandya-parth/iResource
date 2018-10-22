<?php

use Illuminate\Database\Seeder;

class DepartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('departments')->insert([
            'name' => 'General',
            'slug' => 'general',
            'created_at' => '2018-07-16 05:48:24',
            'updated_at' => '2018-07-16 05:48:24',
        ]);
        // DB::table('departments')->insert([
        //     'name' => 'Framework',
        //     'slug' => 'framework',
        //     'created_at' => '2018-07-16 05:48:24',
        //     'updated_at' => '2018-07-16 05:48:24',
        // ]);

        // DB::table('departments')->insert([
        //     'name' => 'Wordpress',
        //     'slug' => 'wordpress',
        //     'created_at' => '2018-07-16 05:48:24',
        //     'updated_at' => '2018-07-16 05:48:24',
        // ]);

        // DB::table('departments')->insert([
        //     'name' => 'Magento',
        //     'slug' => 'magento',
        //     'created_at' => '2018-07-16 05:48:24',
        //     'updated_at' => '2018-07-16 05:48:24',
        // ]);
    }
}
