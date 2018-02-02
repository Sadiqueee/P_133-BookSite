<?php

/**
 * Created by PhpStorm.
 * User: fischerda
 * Date: 02.02.2018
 * Time: 08:56
 */
class Connexion_DB
{
    protected $db_name = 'db_book';
    protected $db_user = 'root';
    protected $db_pass = '';
    protected $db_host = '127.0.0.1';

    function __construct()
    {


        // Open a connect to the database.
        // Make sure this is called on every page that needs to use the database.



        $connect_db = new mysqli( $this->db_host, $this->db_user, $this->db_pass, $this->db_name );

        if ( mysqli_connect_errno() ) {
            printf("Connection failed: %s\ ", mysqli_connect_error());
            exit();
        }
        return true;


    }

}