<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\Image;
use App\Entity\Ingredient;
use App\Entity\Supplier;
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
                ->setFirstName($faker->firstName())
                ->setLastName($faker->lastName())
                ->setPassword($hash)
                ->setIsArchive($faker->boolean(80));

            if ($u === 0) {
                $user->setRoles(["ROLE_ADMIN"]);
            }


            $manager->persist($user);
        }
        $manager->flush();

        // $tabIngredient = $manager->getRepository(Ingredient::class)->findAll();

        for ($i = 0; $i < 20; $i++) {
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

        // Table Image
        for ($img = 0; $img < 20; $img++) {
            $image = new Image;
            $image->setIMGName($faker->colorName())
                ->setIMGUri($faker->imageUrl())
                ->setIMGDateEdit(new \DateTime());

            $manager->persist($image);
        }
        $manager->flush();

        for ($i = 0; $i < 15; $i++) {
            $supplier = new Supplier;
            $supplier->setSUPName($faker->word())
                ->setSUPAddress($faker->streetAddress())
                ->setSUPPostalCode($faker->postcode())
                ->setSUPCity($faker->City())
                ->setSUPPhone('0654545859')
                ->setSUPMail($faker->email())
                ->setSUPIsArchive($faker->boolean(80))
                ->setSUPDateEdit(new \DateTimeImmutable());

            $manager->persist($supplier);
        }

        $manager->flush();

        for ($i = 0; $i < 5; $i++) {
            $category = new Category;
            $category->setName($faker->colorName)
                ->setIsArchive(false);

            $manager->persist($category);
        }
        $manager->flush();
    }
}
