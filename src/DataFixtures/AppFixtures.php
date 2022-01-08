<?php

namespace App\DataFixtures;

use App\Entity\Ingredient;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    /**
     * @var UserPasswordHasherInterface
     */
    private $encoder;
    public function __construct(UserPasswordHasherInterface $encoder)
    {
        $this->encoder = $encoder;
    }


    public function load(ObjectManager $manager): void
    {

        $faker = Factory::create('fr_FR');

        for ($u = 0; $u < 5; $u++) {
            $user = new User;
            $hash = $this->encoder->hashPassword($user, "password");

            $user->setEmail($faker->unique()->safeEmail())
                ->setPassword($hash);

            if ($u === 0) {
                $user->setRoles(["ROLE_ADMIN"]);
            }


            $manager->persist($user);
        }
        $manager->flush();

        // $tabIngredient = $manager->getRepository(Ingredient::class)->findAll();

        for ($i = 0; $i < 200; $i++) {
            $ingredient = new Ingredient;
            $ingredient->setINGName($faker->word())
                ->setINGAllergen($faker->boolean(20))
                ->setINGVege($faker->boolean(30))
                ->setINGPrice($faker->numberBetween(0, 20))
                ->setINGIsArchive($faker->boolean(80))
                ->setINGUnit('kg')
                ->setINGDateEdit(new \DateTimeImmutable());

            $manager->persist($ingredient);
        }

        $manager->flush();
    }
}
