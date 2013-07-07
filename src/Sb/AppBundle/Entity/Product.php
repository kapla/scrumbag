<?php

namespace Sb\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo;
use JMS\Serializer\Annotation as Serializer;

/**
 * Product
 *
 * @ORM\Table(name="product")
 * @ORM\Entity(repositoryClass="Sb\AppBundle\Repository\ProductRepository")
 */
class Product
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     * @Serializer\Groups({"product_all"})
     */
    protected $id;

    /**
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     *
     * @Assert\Length(max="255")
     * @Assert\NotBlank(groups={"New", "Edit"})
     * @Serializer\Groups({"product_all"})
     */
    protected $name;

    /**
     * @ORM\Column(name="description", type="string", length=255, nullable=true)
     *
     * @Assert\Length(max="255")
     * @Assert\NotBlank(groups={"New", "Edit"})
     * @Serializer\Groups({"product_all"})
     */
    protected $description;

    /**
     * @ORM\ManyToOne(targetEntity="Sb\AppBundle\Entity\User", inversedBy="products")
     * @ORM\JoinColumn(name="scrum_master_id", nullable=false)
     *
     * @Assert\NotBlank(groups={"New", "Edit"})
     */
    protected $scrumMaster;

    /**
     * @ORM\Column(name="created_at", type="datetime", nullable=false)
     *
     * @Gedmo\Timestampable(on="create")
     * @Serializer\Groups({"product_all"})
     */
    protected $createdAt;

    /**
     * @ORM\Column(name="updated_at", type="datetime", nullable=false)
     *
     * @Gedmo\Timestampable
     * @Serializer\Groups({"product_all"})
     */
    protected $updatedAt;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Product
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Product
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Product
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     * @return Product
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set scrumMaster
     *
     * @param \Sb\AppBundle\Entity\User $scrumMaster
     * @return Product
     */
    public function setScrumMaster(\Sb\AppBundle\Entity\User $scrumMaster)
    {
        $this->scrumMaster = $scrumMaster;

        return $this;
    }

    /**
     * Get scrumMaster
     *
     * @return \Sb\AppBundle\Entity\User
     */
    public function getScrumMaster()
    {
        return $this->scrumMaster;
    }
}
