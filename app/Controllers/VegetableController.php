<?php

namespace Ellllllen\Controllers;

use Ellllllen\Vegetables;
use Sabre\HTTP\Response;

class VegetableController
{
    /**
     * @var Response
     */
    private $response;
    /**
     * @var Vegetables
     */
    public $vegetables;

    /**
     * VegetableController constructor.
     * @param Response $response
     * @param Vegetables $vegetables
     */
    public function __construct(Response $response, Vegetables $vegetables)
    {
        $this->response = $response;
        $this->vegetables = $vegetables;
    }

    public function anyIndex()
    {
        $vegetables = $this->vegetables->get();

        $this->response->setBody(
            json_encode(['data' => $vegetables])
        );

        return $this->response;
    }
}