<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use app\Entity\Article;

class ArtcilesFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i < 20; $i++) {
            $post = new Article();
            $post->setTitre("Titre de post N: $i ")
                ->setSlug("slug de post N: $i")
                ->setContent("<p> Contenu du post N: $i </p>")
                ->setPublished(new \DateTime());

            $manager->persist($post);
        }
        $manager->flush();
    }
}
