<?php

namespace app\commands;

use tebazil\dbseeder\FakerConfigurator;
use tebazil\dbseeder\GeneratorConfigurator;
use tebazil\yii2seeder\Seeder;
use Yii;
use yii\console\Controller;
use yii\console\ExitCode;

class SeederController extends Controller
{
    private Seeder $seeder;
    private GeneratorConfigurator $generator;
    private FakerConfigurator $faker;

    public function setSeeder()
    {
        $this->seeder = new Seeder();
        $this->generator = $this->seeder->getGeneratorConfigurator();
        $this->faker = $this->generator->getFakerConfigurator();
    }

    public function actionIndex()
    {
        $this->generateCategories();
    }

    private function generateCategories()
    {
        Yii::$app->db->createCommand("SET foreign_key_checks = 0;")->execute();

        $this->setSeeder();
        $this->seeder->table('categories')->columns([
            'id',
            'name' => $this->faker->text(20),
        ])->rowQuantity(30);

        $this->seeder->refill();
        Yii::$app->db->createCommand("SET foreign_key_checks = 1;")->execute();
    }
}