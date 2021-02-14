<?php


namespace App\Service;

use App\Entity\BodyPart;
use App\Repository\BodyPartRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\EntityManagerInterface;
use Exception;

/**
 * Class BodyPartsService
 * @package App\Service
 */
class BodyPartsService
{
    /** @var EntityManagerInterface */
    private $entityManager;

    /** @var BodyPartRepository */
    private $bodyPartRepository;

    /**
     * BodyPartsService constructor.
     * @param EntityManagerInterface $entityManager
     * @param BodyPartRepository $bodyPartRepository
     */
    public function __construct(EntityManagerInterface $entityManager, BodyPartRepository $bodyPartRepository)
    {
        $this->entityManager = $entityManager;
        $this->bodyPartRepository = $bodyPartRepository;
    }

    /**
     * @param string $ownerName
     * @throws Exception
     *
     * @return Collection
     */
    public function getSubPartsByOwner(string $ownerName): array
    {
        $bodyPart = $this->bodyPartRepository->findOneByLowerName($ownerName);

        if (null === $bodyPart) {
            throw new Exception("Nie znaleziono części ciała o nazwie $ownerName");
        }

        return $this->getSubPartsNamesArrByOwner($bodyPart);
    }


    /**
     * @param string $bodyPart
     * @param string $bodySubpart
     * @return bool
     * @throws Exception
     */
    public function doesSubpartBelongToPart(string $bodyPart, string $bodySubpart): bool
    {
        $bodyPart = $this->bodyPartRepository->findOneByLowerName($bodyPart);

        if (null === $bodyPart) {
            throw new Exception("Nie znaleziono części ciała o nazwie $bodyPart");
        }

        $subPartsNames = $this->getSubPartsNamesArrByOwner($bodyPart);

        return in_array($bodySubpart, $subPartsNames);
    }
    /**
     * @param BodyPart $bodyPartOwner
     * @return array
     */
    public function getSubPartsNamesArrByOwner(BodyPart $bodyPartOwner): array
    {
        $result = [];
        foreach ($bodyPartOwner->getBodySubParts() as $bodySubPart) {
            $result[] = $bodySubPart->getName();
        }

        return $result;
    }
}
