<?php

namespace TravelBundle\DataFixtures\ORM;


use Doctrine\Common\DataFixtures\FixtureInterface;

use Doctrine\Common\Persistence\ObjectManager;

use TravelBundle\Entity\Category;


class LoadStuff implements FixtureInterface

{

  // Dans l'argument de la méthode load, l'objet $manager est l'EntityManager

  public function load(ObjectManager $manager)

  {

    // Liste des noms de catégorie à ajouter

    $names = array(

      array('Micro Rode','5','1','40','70','#','0','Micro de Table'),

      array('Go Pro Hero 5','2','5','350','500','#','0','Go Pro Hero +'),

      array('Go Pro Session','2','5','100','250','#','0','Go Pro Hero'),

      array('DJI Mavic Pro','4','4','800','1200','#','0','Parrot')

    );


    foreach ($names as $name) {

      // On crée la catégorie

      $stuff = new Stuff();

      $stuff->setName($name[0]);
      $stuff->setCategory($name[1]);
      $stuff->setPriority($name[2]);
      $stuff->setMinPrice($name[3]);
      $stuff->setPrice($name[4]);
      $stuff->setLink($name[5]);
      $stuff->setBuy($name[6]);
      $stuff->setWorth($name[7]);


      // On la persiste

      $manager->persist($stuff);

    }


    // On déclenche l'enregistrement de toutes les catégories

    $manager->flush();

  }

}