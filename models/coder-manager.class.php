<?php

class CoderManager {

    private $_db;

    function __construct($PDO_Obj)
    {
        $this->setDb($PDO_Obj);
    }

    public function List()
    {
        $req = $this->_db->query('SELECT * from coders');
        $coders_fetched = $req->fetchAll();
        $req->closeCursor();

        $coders = [];

        foreach ($coders_fetched as $coder) {

            $c = new Coder();
        
            $c->id = $coder['id'];
            $c->name = $coder['name'];
            $c->phone_number = $coder['phone_number'];
            $c->country = $coder['country'];
            $c->sex = $coder['sex'];
        
            $coders[] = $c;
          }
        
        return $coders;
    }


    // Private methods
    
    private function setDb(PDO $PDO_Obj)
    {
        $this->_db = $PDO_Obj;
    }

}
