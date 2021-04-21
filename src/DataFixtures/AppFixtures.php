<?php

namespace App\DataFixtures;

use App\Entity\Member;
use App\Entity\Post;
use App\Entity\Commentaire;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;
class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        
        $faker = Faker\Factory::create();
        
        //member
        for($i =0; $i< 10; $i++){
            $member = new Member();
            $member->setUsername($faker->userName);
            $member->setPassword($faker->password);
            $manager->persist($member);
          
        }
        //post
        $posts = [];
        for($i =0; $i< 10; $i++){
            $post = new Post();
            $post->setTitre($faker->text(20));
            $post->setChapo($faker->text(40));
            $post->setContenu($faker->text(255));
            $post->setAuteur($faker->userName);
            $post->setLastEdit($faker->dateTime($max = 'now', $timezone = null));
            // $post->setLastEdit(new \DateTime());
            array_push($posts, $post);
            $manager->persist($post);
          
        }
        // //commentaire
        for($i =0; $i< 10; $i++){
            $commentaire = new Commentaire();
            $commentaire->setIdPost($posts[0]);
            $commentaire->setContenu($faker->text(255));
            $commentaire->setPseudo($faker->userName);
            $commentaire->setDateTimeSave($faker->dateTime($max = 'now', $timezone = null));
            $manager->persist($commentaire);
     
        }
        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}
