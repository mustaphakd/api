<?php


App::uses('AppController', 'Controller');
class RegionsController extends AppController
{
    public $uses = array("Country", "Region");
    public $components = array( 'RequestHandler', 'Paginator');

    public function get(){

        $regions = array();
        $this->Region->recursive = -1;

        $continentParam = (isset($this->passedArgs) && !empty($this->passedArgs))? $this->passedArgs[0] : null;

        if($continentParam == null) {

            $regionList = $this->Region->find('all',
                array(
                    'fields' => array(
                        'Region.id',
                        'Region.name'
                    )
                )
            );
        }
        else{

            $request_continent=strtolower($continentParam);
            $where_condition = " LOWER(Region.continent) LIKE '%".$request_continent."%' " ;



            $regionList = $this->Region->find('all',
                array(
                    'fields' => array(
                        'Region.id',
                        'Region.name'
                    ),
                    'conditions'=> $where_condition
                )
            );
        }

        foreach($regionList as $region)
        {
            array_push($regions, $region['Region']);
        }



        $this->set(array(
            "status" => "success",
            "regions" => $regions,

            "message" => "",
            "_serialize" => array("message", "regions", "status")
        ));
    }
}