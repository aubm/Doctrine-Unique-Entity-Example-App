<?php

namespace AB\VotingSystemBundle\Entity;

class Vote
{
    private $id;
    private $positive;
    private $remote_addr;
    private $http_x_forwarded_for;

    /**
     * @return mixed
     */
    public function getPositive()
    {
        return $this->positive;
    }

    /**
     * @param mixed $positive
     */
    public function setPositive($positive)
    {
        $this->positive = $positive;
    }

    /**
     * @return mixed
     */
    public function getRemoteAddr()
    {
        return $this->remote_addr;
    }

    /**
     * @param mixed $remote_addr
     */
    public function setRemoteAddr($remote_addr)
    {
        $this->remote_addr = $remote_addr;
    }

    /**
     * @return mixed
     */
    public function getHttpXForwardedFor()
    {
        return $this->http_x_forwarded_for;
    }

    /**
     * @param mixed $http_x_forwarded_for
     */
    public function setHttpXForwardedFor($http_x_forwarded_for)
    {
        $this->http_x_forwarded_for = $http_x_forwarded_for;
    }
}