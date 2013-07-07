<?php

namespace Sb\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo;

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
     */
    protected $id;

    /**
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     *
     * @Assert\Length(max="255")
     * @Assert\NotBlank(groups={"New", "Edit"})
     */
    protected $name;

    /**
     * @ORM\Column(name="description", type="string", length=255, nullable=true)
     *
     * @Assert\Length(max="255")
     * @Assert\NotBlank(groups={"New", "Edit"})
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
     */
    protected $createdAt;

    /**
     * @ORM\Column(name="updated_at", type="datetime", nullable=false)
     *
     * @Gedmo\Timestampable
     */
    protected $updatedAt;
}