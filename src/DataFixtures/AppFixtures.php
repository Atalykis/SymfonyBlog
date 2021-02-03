<?php

namespace App\DataFixtures;

use App\Entity\Article;
use App\Entity\Category;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for($j =1; $j <5 ; $j++){
            
            $user = new User();
            $user->setEmail('blablab'.$j.'@bla.bla');
            $user->setPassword('Oui'.$j.'Oui');
            $user->setFirstname('Jean-Claude'.$j);
            $user->setLastName('Van-Damn'.$j);
            $user->setUsername('OuiNonOui'.$j);
            $user->setBornAt(new \DateTime());
            $manager->persist($user);
            
            $cat = new Category();
            $cat->setName('Oui'.$j.'Oui');
            $cat->setDescription(str_repeat('Olalala ',$j));
            $manager->persist($cat);
            
            for ($i = 0; $i < 10; $i++) {

                $article = new Article();
                $article->setTitle('article'.$i.'Title du cul');
                $article->setContent(str_repeat('Muda Muda ', $i));
                $article->setUserId($user);
                $article->addCategoryId($cat);
                $article->setPublishedAt(new \DateTime());
                $article->setCreatedAt(new \DateTime());
                $manager->persist($article);
            }
            
        }
        

        $manager->flush();
    }
}
