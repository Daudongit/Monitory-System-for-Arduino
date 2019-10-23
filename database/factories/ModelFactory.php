<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'username' => $faker->unique()->userName,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Map::class,function(Faker\Generator $faker){
    return [
        'device_id'=>function(){
            return factory(App\Device::class)->create()->id;
        },
        'longitude'=>$faker->longitude(),
        'latitude'=>$faker->latitude(),
        'intoxicant_level'=>$faker->numberBetween(1,9),
        'created_at'=>$faker->dateTimeBetween('-4 months','-1 months'),
    ];
});

$factory->define(App\Device::class,function(Faker\Generator $faker){
    return [
        'name'=>$faker->bs
    ];
});

$factory->define(App\Status::class,function(Faker\Generator $faker){
    return [
        'status'=>$faker->bs,
        'created_at'=>$faker->dateTimeBetween('-7 months','-1 months')
    ];
});
