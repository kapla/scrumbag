<?php

namespace Sb\AppBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use JMS\SecurityExtraBundle\Annotation\PreAuthorize;
use FOS\RestBundle\Controller\Annotations as Rest;

use Sb\AppBundle\Entity\Product;

use FOS\RestBundle\Controller\Annotations\QueryParam;

/**
 * Product controller
 *
 * @Route("/products")
 */
class ProductController extends FOSRestController
{
    /**
     * List all products
     *
     * @QueryParam(
     *     name="count",
     *     requirements="[1-9]|[1-9][0-9]|[1][0-9][0-9]|200",
     *     strict=true,
     *     default="50",
     *     nullable=true,
     *     description="Item count limit (default value : 50)"
     * )
     * @QueryParam(
     *     name="since_id",
     *     requirements="\d+",
     *     strict=true,
     *     nullable=true,
     *     description="Fetch only products newer than since_id"
     * )
     * @QueryParam(
     *     name="max_id",
     *     requirements="\d+",
     *     strict=true,
     *     nullable=true,
     *     description="Fetch only products older than max_id"
     * )
     *
     * @Rest\View(serializerGroups={"list"})
     *
     * @param Request $request
     */
    public function getProductsAction(Request $request, $count, $since_id, $max_id)
    {
        //Need a fix
        $sinceId = $since_id;
        $maxId = $max_id;

        $em = $this->getDoctrine()->getManager();
        $qb = $em->getRepository('SbAppBundle:Product')
            ->createQueryBuilder('p');

        $qb->setMaxResults($count);

        if ($sinceId) {
            $qb->andWhere('p.id >= :sinceId');
            $qb->setParameter(':sinceId', $sinceId);
        }

        if ($maxId) {
            $qb->andWhere('p.id <= :maxId');
            $qb->setParameter(':maxId', $maxId);
        }

        $products = $qb->getQuery()->getResult();

        return array(
            'products' => $products,
            'count'    => $count,
            'sinceId'  => $sinceId,
            'maxId'    => $max_id
        );
    }

    /**
     * Get a product
     *
     * @Rest\View(serializerGroups={"details"})
     */
    public function getProductAction($id)
    {
        $em      = $this->getDoctrine()->getManager();
        $product = $em->getRepository('SbAppBundle:Product')->find($id);

        if (!$product instanceof Product) {
            throw new NotFoundHttpException('Product not found');
        }

        return array('product' => $product);
    }
}
