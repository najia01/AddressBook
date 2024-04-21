<?php

namespace App\DataFixtures;
use App\Entity\Contact;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $contacts = [
            $this->createContact('Dupond','Jean','0212369689'),
            $this->createContact('Durand','Jeannette','0212899689'),
            $this->createContact('Dupuis','Jean','0212365899'),
            $this->createContact('Dulois','Jil','0212365789'),
          ];
     
          foreach ($contacts as $contact){
            $manager->persist($contact);
          }

        $manager->flush();
    }

    private function createContact(string $nom, string $prenom,string $telephone): Contact
    {
        $contact = new Contact();

        $contact 
        -> setNom($nom)
        -> setPrenom($prenom)
        -> setTelephone($telephone);

        return $contact;
    }
}
