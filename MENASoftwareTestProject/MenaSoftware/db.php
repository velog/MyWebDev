<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of db
 *
 * @author Mupo
 */

namespace MenaSoftware;

class DB extends \mysqli {

    private $db_host = 'localhost';
    private $username = 'root';
    private $password = '';
    private $db_name = 'minasoftware';

    function __construct() {

        parent::__construct($this->db_host, $this->username, $this->password, $this->db_name);
         echo $this->connect_error;
        echo $this->error;
        return $mysqli;
    }

    public function my_qyery($query) {
        $esc_query = $this->real_escape_string($query);
      //  echo $this->error;
        return $this->query($esc_query);
    }

}
