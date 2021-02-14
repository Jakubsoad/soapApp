<?php


namespace App\Service;

use Exception;

/**
 * Class SoapService
 * @package App\Service
 */
class SoapService
{
    /** @var BodyPartsService */
    private $bodyPartsService;

    /**
     * SoapService constructor.
     * @param BodyPartsService $bodyPartsService
     */
    public function __construct(BodyPartsService $bodyPartsService)
    {
        $this->bodyPartsService = $bodyPartsService;
    }

    /**
     * @param $bodyPartName
     * @return array
     * @throws Exception
     */
    public function getSubParts(string $bodyPartName): array
    {
        return $this->bodyPartsService->getSubPartsByOwner($bodyPartName);
    }

    /**
     * @param string $bodyPart
     * @param string $bodySubpart
     * @return bool
     * @throws Exception
     */
    public function doesSubpartBelongToPart(string $bodyPart, string $bodySubpart): bool
    {
        return $this->bodyPartsService->doesSubpartBelongToPart($bodyPart, $bodySubpart);
    }
}
