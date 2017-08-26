<?php

namespace LibraryBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

class AuthorController extends Controller
{
    /**
     * Get all authors using limit and offset
     *
     * @Route("/authors", name="get_authors_action")
     * @Method("GET")
     *
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function getAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $limit = $request->get('limit');
        $offset = $request->get('offset');

        try {
            $books = $em->getRepository('LibraryBundle:Author')
                ->getAuthors(intval($limit), intval($offset));

            return new JsonResponse(
                [
                    'status' => 'OK',
                    'message' => 'Ok',
                    'data' => ['books' => $books],
                    'offset' => $offset,
                    'limit' => $limit
                ],
                JsonResponse::HTTP_OK
            );
        } catch (\Exception $e) {
            return new JsonResponse(
                [
                    'status' => 'NOT_FOUND',
                    'message' => $e->getMessage(),
                    'offset' => $offset,
                    'limit' => $limit
                ],
                JsonResponse::HTTP_NOT_FOUND
            );
        }
    }
}
