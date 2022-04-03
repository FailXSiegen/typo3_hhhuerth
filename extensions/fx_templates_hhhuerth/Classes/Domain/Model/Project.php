<?php

namespace Failx\FxTemplatesHhhuerth\Domain\Model;

use TYPO3\CMS\Extbase\Domain\Model\FileReference;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

/**
 * Project model
 */
class Project extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * @var \DateTime
     */
    protected $crdate;

    /**
     * @var \DateTime
     */
    protected $tstamp;

    /**
     * @var int
     */
    protected $sysLanguageUid;

    /**
     * @var int
     */
    protected $l10nParent;

    /**
     * @var \DateTime
     */
    protected $starttime;

    /**
     * @var \DateTime
     */
    protected $endtime;

    /**
     * keep it as string as it should be only used during imports
     *
     * @var string
     */
    protected $feGroup;

    /**
     * @var bool
     */
    protected $hidden;

    /**
     * @var bool
     */
    protected $deleted;

    /**
     * @var int
     */
    protected $cruserId;

    /**
     * @var int
     */
    protected $gallerytype;

    /**
     * @var string
     */
    protected $title;

    /**
     * @var string
     */
    protected $rowDescription;

    /**
     * @var int
     */
    protected $ttContentRelatedProject;
    
    /**
     * Fal media items
     *
     * @var ObjectStorage<FileReference>
     * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
     */
    protected $imageBefore;

    /**
    * Fal media items
    *
    * @var ObjectStorage<FileReference>
    * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
    */
    protected $imageAfter;

    /**
    * Fal media items
    *
    * @var ObjectStorage<FileReference>
    * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
    */
    protected $gallery;

    /**
     * Initialize categories and media relation
     *
     * @return \Failx\FxTemplatesHhhuerth\Domain\Model\Project
     */
    public function __construct()
    {
        $this->imageBefore = new ObjectStorage();
        $this->imageAfter = new ObjectStorage();
        $this->gallery = new ObjectStorage();
    }
    
    /**
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     *
     * @return string
     */
    public function getRowDescription()
    {
        return $this->rowDescription;
    }

    /**
     * Get the Fal media items
     *
     * @return int
     */
    public function getGallerytype()
    {
        return $this->gallerytype;
    }

    /**
     * Get the Fal media items
     *
     * @return int
     */
    public function getTtContentRelatedProject()
    {
        return $this->ttContentRelatedProject;
    }

    /**
     * Get the Fal media items
     *
     * @return ObjectStorage
     */
    public function getImageBefore()
    {
        return $this->imageBefore;
    }

    /**
     * Set Fal media relation
     *
     * @param ObjectStorage $imageBefore
     */
    public function setImageBefore(ObjectStorage $imageBefore)
    {
        $this->imageBefore = $imageBefore;
    }

    /**
     * Get the Fal media items
     *
     * @return ObjectStorage
     */
    public function getImageAfter()
    {
        return $this->imageAfter;
    }

    /**
     * Set Fal media relation
     *
     * @param ObjectStorage $imageAfter
     */
    public function setImageAfter(ObjectStorage $imageAfter)
    {
        $this->imageAfter = $imageAfter;
    }
    
    /**
     * Get the Fal media items
     *
     * @return ObjectStorage
     */
    public function getGallery()
    {
        return $this->gallery;
    }

    /**
     * Set Fal media relation
     *
     * @param ObjectStorage $gallery
     */
    public function setGallery(ObjectStorage $gallery)
    {
        $this->gallery = $gallery;
    }
}
