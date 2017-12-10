    <?php

    // You have to replace the variables below with your own MySQL credentials

      $username = 'dav' ;
      $password = 'dav';
      $database_name = 'github_localapi';
      $server_name = 'localhost';

        try
        {
            $bdd= new PDO('mysql:host='.$server_name.';dbname='.$database_name.'',$username,$password,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        }
        catch(Exception $e)
        {
            die('Connexion to MySQL failed ! </br>'.$e->getMessage());
        }

    ?>
