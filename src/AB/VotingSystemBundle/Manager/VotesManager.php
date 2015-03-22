<?php

namespace AB\VotingSystemBundle\Manager;

use AB\VotingSystemBundle\Entity\Vote;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Validator\ConstraintViolationListInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class VotesManager
{
    private $entity_manager;
    private $validator;

    public function __construct(EntityManagerInterface $entity_manager, ValidatorInterface $validator)
    {
        $this->entity_manager = $entity_manager;
        $this->validator = $validator;
    }

    /**
     * @return Vote
     */
    public function newEntity($data)
    {
        $entity = new Vote();

        if (isset($data['remote_addr'])) {
            $entity->setRemoteAddr($data['remote_addr']);
        }
        if (isset($data['http_x_forwarded_for'])) {
            $entity->setHttpXForwardedFor($data['http_x_forwarded_for']);
        }
        if (isset($data['positive'])) {
            $entity->setPositive($data['positive']);
        }

        return $entity;
    }

    /**
     * @return ConstraintViolationListInterface
     */
    public function validateEntity(Vote $entity)
    {
        return $this->validator->validate($entity);
    }

    public function saveEntity(Vote $entity)
    {
        $this->entity_manager->persist($entity);
        $this->entity_manager->flush();
    }
}