<?php

$seeder = new \tebazil\yii2seeder\Seeder();
$generator = $seeder->getGeneratorConfigurator();
$faker = $generator->getFakerConfigurator();

$seeder->table('categories')->columns([
    'id',
    'name' => $faker->text(20),
])->rowQuantity(30);
