<?php

use Faker\Generator as Faker;

$factory->define(App\Book::class, function (Faker $faker) {
    
    $paragraph = '';
    for ($i = 0; $i < 4; $i++) {
	
		$paragraph .= $faker->paragraph;

    }

    //list of sample covers, stored in public images
    // $covers = [
    // 	'/sample1.jpg',
    // 	'/sample1-2.jpg',
    // 	'/sample1-3.jpg',
    // 	'/sample1-4.jpg'
    // ];

    //get random cover
    // $cover = array_rand($covers, 2);

    return [
        'title' => $faker->sentence,
        'description' => $paragraph,
    ];
});
