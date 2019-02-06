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
        if(DB::table('users')->get()->count() == 0)
        {
            DB::table('users')->insert([
                'name' => 'view',
                'email' => 'view@app.com',
                'password' => bcrypt('view'),
                'type_id'=>1
            ]);
            DB::table('users')->insert([
                'name' => 'post',
                'email' => 'post@app.com',
                'password' => bcrypt('post'),
                'type_id'=>2
            ]);
            DB::table('users')->insert([
                'name' => 'edit',
                'email' => 'edit@app.com',
                'password' => bcrypt('edit'),
                'type_id'=>3
            ]);

        }
        else
        {
            echo "\nError ! there is 3 users to test\n";
        }
    }
}
