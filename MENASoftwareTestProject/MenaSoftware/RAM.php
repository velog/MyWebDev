<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace MenaSoftware;

/**
 * Description of RAM
 *
 * @author Mupo
 */
class RAM {

    //SELECT ONE RAM PRODUCT FROM DB WHIT ID
    public static function SelectRAM($id, $con) {
        $product_id = htmlspecialchars($id);

        $ram = array();
        $ram_query = "SELECT * FROM ram WHERE ram_id=" . $product_id;

        $ram_result = $con->my_qyery($ram_query);
        while ($row = mysqli_fetch_assoc($ram_result)) {

            $ram = $row;
        }
        return $ram;
    }

    //GET ALL RAM prodcuts FROM DB
    public static function GetAllRAMs($con) {
        $ram_arr = array();

        $ram_query = "SELECT ram_name,ram_id FROM `ram`";
        $ram_result = $con->my_qyery($ram_query);

        while ($row = mysqli_fetch_assoc($ram_result)) {
            //  print_r($row);
            $ram_arr[] = $row;
        }
        return $ram_arr;
    }

}
