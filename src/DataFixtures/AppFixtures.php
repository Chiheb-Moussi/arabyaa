<?php

namespace App\DataFixtures;

use App\Entity\Post;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{
    
    
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();

        $unixTimestamp = '1461067200';
        for ($i = 0; $i < 100; $i++) {
            $post = new Post();
            $post->setTitle($faker->name);
            $post->setContent($faker->text);
            $post->setimage('aaa'.$i.'.jpg');
            $post->setCreatedAt($faker->dateTimeBetween($unixTimestamp, 'now'));
            $manager->persist($post);
        }


        $manager->flush();
    }
}
