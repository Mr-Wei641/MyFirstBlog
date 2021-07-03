<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::truncate();
        factory(User::class,20)->create();
        User::where('id',1)->update(['username'=>'admin']);
    }
}
