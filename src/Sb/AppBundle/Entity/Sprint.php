<?php

namespace Sb\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Sprint
 *
 * @ORM\Table(name="sprint")
 * @ORM\Entity(repositoryClass="Sb\AppBundle\Repository\SprintRepository")
 */
class Sprint
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
