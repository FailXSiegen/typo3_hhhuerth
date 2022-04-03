<?php

declare(strict_types=1);

namespace Failx\FxTemplatesHhhuerth\DataProcessing;

use Failx\FxTemplatesHhhuerth\Domain\Repository\ProjectRepository;

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Object\ObjectManager;
use TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer;
use TYPO3\CMS\Frontend\ContentObject\DataProcessorInterface;

class AddProjectsToContentProcessor implements DataProcessorInterface
{

    /**
     * @param ContentObjectRenderer $cObj
     * @param array $contentObjectConfiguration
     * @param array $processorConfiguration
     * @param array $processedData
     * @return array
     */
    public function process(ContentObjectRenderer $cObj, array $contentObjectConfiguration, array $processorConfiguration, array $processedData)
    {
        $projectRecords = $this->getProjectsFromContent($processedData['data']['uid']);
        $targetVariableName = $cObj->stdWrapValue('as', $processorConfiguration, 'files');
        $processedData[$targetVariableName] = $projectRecords;

        return $processedData;
    }
    /**
     * Get the news record including possible translations
     *
     * @return array
     */
    protected function getProjectsFromContent($uid): array
    {
        if ($uid) {
            $objectManager = GeneralUtility::makeInstance(ObjectManager::class);
            $projectRepository= $objectManager->get(ProjectRepository::class);
            $projects = $projectRepository->findByttContentRelatedProject($uid)->toArray();
            return $projects;
        }
        return [];
    }
}
