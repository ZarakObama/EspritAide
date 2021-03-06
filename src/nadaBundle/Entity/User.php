<?php
/**
 * Created by PhpStorm.
 * User: mzark
 * Date: 18/02/2018
 * Time: 14:13
 */
namespace nadaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
/**
 *
 *
 * @ORM\Table(name="User")
 * @ORM\Entity
 * @Vich\Uploadable
 */
class User extends BaseUser
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    public $id;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @var string
     *
     * @ORM\Column(name="Nom", type="string", length=12, nullable=true)
     */
    public $reNom;

    /**
     * @var string
     *
     * @ORM\Column(name="Prenom", type="string", length=9, nullable=true)
     */
    public $rePrenom;

    /**
     * @ORM\Column(name="Datecreation",type="datetime", nullable=false)
     * @ORM\Version
     * @var \DateTime
     */
    public $reDatecreation = null;

    /**
     * @return string
     */
    public function getReNom()
    {
        return $this->reNom;
    }

    /**
     * @param string $reNom
     */
    public function setReNom($reNom)
    {
        $this->reNom = $reNom;
    }

    /**
     * @return string
     */
    public function getRePrenom()
    {
        return $this->rePrenom;
    }

    /**
     * @param string $rePrenom
     */
    public function setRePrenom($rePrenom)
    {
        $this->rePrenom = $rePrenom;
    }

    /**
     * @return \DateTime
     */
    public function getReDatecreation()
    {
        return $this->reDatecreation;
    }

    /**
     * @param \DateTime $reDatecreation
     */
    public function setReDatecreation($reDatecreation)
    {
        $this->reDatecreation = $reDatecreation;
    }
    /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     *
     * @Vich\UploadableField(mapping="product_image", fileNameProperty="imageName")
     *
     */
    public $imageFile;
    /**
     * @ORM\Column(type="string", length=255,nullable=true)
     *
     * @var string
     */
    public $imageName;
    /**
     * @ORM\Column(type="datetime",nullable=true)
     *
     * @var \DateTime
     */
    public $updatedAt;

    /**
     * FRepresent constructor.
     * @param null $reDatecreation
     */
    public function __construct()
    {
        $this->reDatecreation = new \DateTime();
        parent::__construct();

    }

    /**
     * If manually uploading a file (i.e. not using Symfony Form) ensure an instance
     * of 'UploadedFile' is injected into this setter to trigger the  update. If this
     * bundle's configuration parameter 'inject_on_load' is set to 'true' this setter
     * must be able to accept an instance of 'File' as the bundle will inject one here
     * during Doctrine hydration.
     *
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile $image
     *
     * @return User
     */
    public function setImageFile(File $image = null)
    {
        $this->imageFile = $image;
        if ($image) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTimeImmutable();
        }
        return $this;
    }
    /**
     * @return File|null
     */
    public function getImageFile()
    {
        return $this->imageFile;
    }
    /**
     * @param string $imageName
     *
     * @return User
     */
    public function setImageName($imageName)
    {
        $this->imageName = $imageName;
        return $this;
    }
    /**
     * @return string|null
     */
    public function getImageName()
    {
        return $this->imageName;
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @param \DateTime $updatedAt
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
    }

}