<?php

namespace LibraryBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

class BookController extends Controller
{
    /**
     * Get all books using limit and offset
     *
     * @Route("/books", name="get_books_action")
     * @Method("GET")
     *
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function getBooksAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $limit = $request->get('limit');
        $offset = $request->get('offset');

        try {
            $books = $em->getRepository('LibraryBundle:Book')
                ->getBooks(intval($limit), intval($offset));

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

    /**
     * Get books by author using limit and offset
     *
     * @Route("/author/{id}/books", name="get_books_by_author_action")
     * @Method("GET")
     *
     * @param Request $request
     * @param $id
     *
     * @return JsonResponse
     */
    public function getBooksByAuthorAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $limit = $request->get('limit');
        $offset = $request->get('offset');

        try {
            $books = $em->getRepository('LibraryBundle:Book')
                ->getBooksByAuthor(intval($limit), intval($offset), intval($id));

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
