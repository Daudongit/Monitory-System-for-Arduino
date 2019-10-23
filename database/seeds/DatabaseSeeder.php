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
        $password = bcrypt('secret');
        // $this->call(UsersTableSeeder::class);
        factory(App\User::class)->create([
            'email'=>'admin@mail.com',
            'username'=>'admin',
            'password'=>$password
        ]);

        factory(App\User::class)->create([
            'email'=>'map@mail.com',
            'username'=>'map',
            'password'=>$password
        ]);

        factory(App\User::class)->create([
            'email'=>'status@mail.com',
            'username'=>'status',
            'password'=>$password
        ]);

        $devices = factory(App\Device::class,5)->create();
        
        $devices->each(function($device){
            factory(App\Map::class, rand(5,10))->create([
                'device_id'=>$device->id
            ]);
        });

        factory(App\Status::class, 80)->create();
        
    }
}
