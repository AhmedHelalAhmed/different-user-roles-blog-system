<?php

use Illuminate\Database\Seeder;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(DB::table('types')->get()->count() == 0)
        {
            DB::table('types')->insert([
                ['permission' => "view"]
            ]);
            DB::table('types')->insert([
                ['permission' => "post"]
            ]);
            DB::table('types')->insert([
                ['permission' => "edit"]
            ]);
        }
        else
        {
            echo "\nError ! there is 3 types to test\n";
        }
    }
}
