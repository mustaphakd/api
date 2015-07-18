<?php


App::uses('AppController', 'Controller');
class CountriesController extends AppController
{
    public $uses = array("Country", "Region");
    public $components = array( 'RequestHandler', 'Paginator');

    public function get(){

        $countries = array();
        $this->Country->recursive = -1;

        $continentParam = (isset($this->passedArgs) && !empty($this->passedArgs))? $this->passedArgs[0] : null;

        if($continentParam == null) {

            $countryist = $this->Country->find('all',
                array(
                    'fields' => array(
                        'ISO3166-1-Alpha-3',
                        'Country.name'
                    )
                )
            );
        }
        else{

            /*
             *
             * $options['joins'] = array(
    array('table' => 'books_tags',
        'alias' => 'BooksTag',
        'type' => 'inner',
        'conditions' => array(
            'Book.id = BooksTag.book_id'
        )
    ),
    array('table' => 'tags',
        'alias' => 'Tag',
        'type' => 'inner',
        'conditions' => array(
            'BooksTag.tag_id = Tag.id'
        )
    )
);

$options['conditions'] = array(
    'Tag.tag' => 'Novel'
);

             */

            $request_continent=strtolower($continentParam);
            $where_condition = " LOWER(Region.continent) LIKE '%".$request_continent."%' " ;

            $joins_condition = array(
                array('table'=>'regions',
                    'alias' => 'Region',
                    'type'=>'INNER ',
                    'conditions'=> array('Country.continent_id = Region.id')
                )
            );



            $countryist = $this->Country->find('all',
                array(
                    'fields' => array(
                        'ISO3166-1-Alpha-3',
                        'Country.name'
                    ),
                    'joins'=> $joins_condition,
                    'conditions' => array($where_condition)
                )
            );
        }

        foreach($countryist as $country)
        {
            array_push($countries, $country['Country']);
        }



        $this->set(array(
            "status" => "success",
            "countries" => $countries,

            "message" => "",
            "_serialize" => array("message", "countries", "status")
        ));
    }
}