<?php


App::uses('AppController', 'Controller');
class ContinentsController extends AppController
{
    public $uses = array("Country", "Region");
    public $components = array( 'RequestHandler', 'Paginator');

    public function get(){

        $continents = array();
        $this->Region->recursive = -1;
        $regionList = $this->Region->find('all',
            array(
                'fields' => array('DISTINCT (Region.continent) AS name'),
            )
            );

        foreach($regionList as $region )
            array_push( $continents, $region['Region']['name']);

        $this->set(array(
            "status" => "success",
            "continents" => $continents,

            "message" => "",
            "_serialize" => array("message", "continents", "status")
        ));
    }
}