<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Video;

class VideoFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $videosData = [
            [
                'title' => 'compresser une video',
                'linkVideo' => 'https://www.youtube.com/watch?v=ttjGFkand7s',
                'description' => 'Les créateurs d\'animations sur YouTube publient des images numériques et des vidéos de dialogue qu\'ils ont eux-mêmes réalisées. Il s\'agit de vidéos YouTube courtes qui racontent une histoire captivante par le biais d\'images, de textes animés et de voix off.',
            ],
            [
                'title' => 'comment utiliser make',
                'linkVideo' => 'https://www.youtube.com/watch?v=jq6KVKmV2VU',
                'description' => 'Les YouTubers conspirationnistes peuvent y parler d\'événements ou de personnes célèbres qui ne font pas l\'unanimité. Certaines de ces vidéos YouTube conspirationnistes abordent des événements historiques, ',
            ],
            [
                'title' => 'methodologie de webflow',
                'linkVideo' => 'https://www.youtube.com/watch?v=Lg1T0yF5jmk',
                'description' => 'Les chaînes de vlogs quotidiens peuvent partager des idées de vidéos YouTube comme des conseils, des routines quotidiennes et un aperçu des activités de la vie personnelle. Le montage de ces vidéos figure parmi les plus accessibles',
            ]
        ];

        foreach ($videosData as $videoData){
            $video = new Video();
            $video->setTitle($videoData['title']);
            $video->setLinkVideo($videoData['linkVideo']);
            $video->setDescription($videoData['description']);

            $manager->persist($video);
        }

        $manager->flush();
    }
    }