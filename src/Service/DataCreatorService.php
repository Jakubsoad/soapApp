<?php


namespace App\Service;

use App\Entity\BodyPart;
use App\Entity\BodySubParts;
use Doctrine\ORM\EntityManagerInterface;

/**
 * Class DataCreatorService
 * @package App\Service
 */
class DataCreatorService
{
    /** @var EntityManagerInterface */
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function createDataToDB()
    {
        $bodyPart = new BodyPart('ręka');
        $subPartsArr = [
            'kciuk',
            'dłoń',
            'łokieć',
            'kończyna górna',
            'ręka',
        ];
        $this->createBodyPartWithSubparts($bodyPart, $subPartsArr);

        $bodyPart = new BodyPart('głowa');
        $subPartsArr = [
            'nos',
            'oko',
            'czoło',
            'policzek',
        ];
        $this->createBodyPartWithSubparts($bodyPart, $subPartsArr);

        $bodyPart = new BodyPart('noga');
        $subPartsArr = [
            'kolano',
            'kostka',
            'piszczel',
            'udo',
            'stopa',
        ];
        $this->createBodyPartWithSubparts($bodyPart, $subPartsArr);
    }

    private function createBodyPartWithSubparts(BodyPart $bodyPart, array $subPartsArr)
    {
        $this->entityManager->persist($bodyPart);

        foreach ($subPartsArr as $subPartName) {
            $subPart = new BodySubParts($subPartName);
            $subPart->setOwnerBodyPart($bodyPart);
            $this->entityManager->persist($subPart);
        }

        $this->entityManager->flush();
    }
}