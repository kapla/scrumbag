<?php

namespace Sb\AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use JMS\SecurityExtraBundle\Annotation\PreAuthorize;

/**
 * Project controller
 *
 * @PreAuthorize("isFullyAuthenticated()")
 * @Route("/project")
 */
class ProjectController extends BaseController
{
    /**
     * List all projects
     *
     * @Route("/", name="project_index")
     * @Template()
     */
    public function indexAction()
    {
        return array();
    }
}
