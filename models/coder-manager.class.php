<?php

class CoderManager {

    private $_db;

    function __construct($PDO_Obj)
    {
        $this->setDb($PDO_Obj);
    }

    /** Used to retrieve all coders from database
     * @return Array of Coder
     */
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

    public function getDetails($id)
    {
        $req = $this->_db->prepare('SELECT * from coders WHERE id = :id');

        $req->execute(array('id' => $id));
        $details = $req->fetch();
        $req->closeCursor();

        return $details;
    }

    /**
     * This method is used to insert specified Coder into database
     * @return true if success / false else
     */
    public function Add(Coder $coder)
    {
        $success = false;

        $req = $this->_db->prepare('INSERT INTO coders(name, phone_number, country, sex) VALUES(:name, :phone_number, :country, :sex) ');
        $req->execute(array(
            'name' => $coder->name,
            'phone_number' => $coder->phone_number,
            'sex' => $coder->sex,
            'country' => $coder->country
        ));

        $success = true;
        $req->closeCursor();

        return $success;
    }

    public function Delete($id) 
    {
        $req = $this->_db->prepare('DELETE FROM coders WHERE id = :id');
        $req->execute(array('id' => $id));
        
        $req->closeCursor();

        return TRUE;
    }

    // Private methods

    private function Exists($id)
    {
        $founded = false;

        $req = $this->_db->prepare('SELECT * FROM coders WHERE id = :id');
        $req->execute(array('id' => $id));
        $resultat = $req->fetch();

        if (!$resultat) {  $reponse = false; }
        else { $reponse = true; }

        return $reponse;
    }
    
    private function setDb(PDO $PDO_Obj)
    {
        $this->_db = $PDO_Obj;
    }

}
