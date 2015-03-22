<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class VotesController extends Controller
{
    public function createAction(Request $request)
    {
        $votes_manager = $this->container->get('ab.voting_system.votes_manager');
        $vote = $votes_manager->newEntity([
                'remote_addr' => $request->server->get('REMOTE_ADDR'),
                'http_x_forwarded_for' => $request->server->get('HTTP_X_FORWARDED_FOR')
            ] + $request->request->all());
        $validation_errors = $votes_manager->validateEntity($vote);
        if (count($validation_errors) == 0) {
            $votes_manager->saveEntity($vote);
            return new JsonResponse(null, 201);
        } else {
            return new JsonResponse(null, 400);
        }
    }
}