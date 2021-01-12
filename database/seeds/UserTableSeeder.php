<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for($i = 1; $i <= 10;$i++)
        {
        	DB::table('Users')->insert(
	        	[
	        		'name' => 'User_'.$i,
                    'email' => 'user_'.$i.'@mymail.com',
                    'phone' => rand(),
	            	'password' => bcrypt('123456'),
	            	'quyen'=> rand(0,1),
	            	'created_at' => new DateTime(),
	        	]
        	);
        }
    }
}
