<?php

use Illuminate\Database\Seeder;

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
        factory(App\User::class)->create([
            'email'=>'admin@mail.com',
            'password'=>'secret'
        ]);

        $devices = factory(App\Device::class,5)->create();
        
        $devices->each(function($device){
            factory(App\Map::class, rand(5,10))->create([
                'device_id'=>$device->id
            ]);
        });
        
    }
}
