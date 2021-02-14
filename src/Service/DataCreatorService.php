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

    /**
     * DataCreatorService constructor.
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * Create example data
     */
    public function createDataToDB(): void
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

    /**
     * @param BodyPart $bodyPart
     * @param array $subPartsArr
     */
    private function createBodyPartWithSubparts(BodyPart $bodyPart, array $subPartsArr): void
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
