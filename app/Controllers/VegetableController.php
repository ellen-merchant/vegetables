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

    /**
     * @return Response
     */
    public function get()
    {
        $vegetables = $this->vegetables->get();

        $this->response->setBody(
            json_encode(['data' => $vegetables])
        );

        return $this->response;
    }

    /**
     * Render CLI output.
     *
     * @return string
     */
    public function renderCliOutput()
    {
        $vegetables = $this->vegetables->get();

        if ($vegetables) {
            $response = "| id | name | classification | description | edible |\n";
            $response .= "|----|------|----------------|-------------|--------|\n";
            foreach ($vegetables as $vegetable) {
                $response .= "| {$vegetable['id']} | {$vegetable['name']} | {$vegetable['classification']} | {$vegetable['description']} | {$vegetable['edible']} | \n";
            }
        } else {
            $response = "No vegetables found.";
        }

        return $response;
    }
}