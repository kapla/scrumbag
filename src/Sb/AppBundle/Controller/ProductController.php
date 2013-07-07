<?php

namespace Sb\AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use JMS\SecurityExtraBundle\Annotation\PreAuthorize;
use FOS\RestBundle\Controller\Annotations as Rest;

use Sb\AppBundle\Entity\Product;

use JMS\Serializer\SerializationContext;
use Symfony\Component\HttpFoundation\AcceptHeader;

/**
 * Product controller
 *
 * @Route("/products")
 */
class ProductController extends BaseController
{
    /**
     * List all products
     *
     * @Route("/", name="product_all", defaults={"_format" = "~"})
     * @Method({"GET"})
     * @Rest\View
     */
    public function allAction(Request $request)
    {
        $em       = $this->getDoctrine()->getManager();
        $products = $em->getRepository('SbAppBundle:Product')->findAll();

        $serializer = $this->container->get('jms_serializer');
        $data = $serializer->serialize(
            $products,
            'json',
            SerializationContext::create()->setGroups(array('product_all'))
        );

        return array('products' => $data);
    }

    /**
     * Get a product
     *
     * @Route("/get/{id}", name="product_get", defaults={"_format" = "~"})
     * @Method({"GET"})
     * @Rest\View()
     */
    public function getAction($id)
    {
        $em      = $this->getDoctrine()->getManager();
        $product = $em->getRepository('SbAppBundle:Product')->find($id);

        if (!$product instanceof Product) {
            throw new NotFoundHttpException('Product not found');
        }

        return array('product' => $product);
    }
}
