<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace MenaSoftware;

/**
 * Description of CPU
 *
 * @author Mupo
 */
class CPU {


    //SELECT ONE CPU FROM DB WHIT ID
    public static function SelectCPU($id, $con) {
        $product_id = htmlspecialchars($id);

        $cpu = array();
        $cpu_query = "SELECT * FROM cpu WHERE cpu_id=" . $product_id;
        $cpu_result = $con->my_qyery($cpu_query);
        while ($row = mysqli_fetch_assoc($cpu_result)) {

            $cpu = $row;
        }

        return $cpu;
    }

    
    //GET ALL CPUS FROM DB
    public static function GetAllCPUs($con) {
        $cpu_arr = array();

        $cpu_query = "SELECT cpu_name,cpu_id FROM `cpu`";
        $cpu_result = $con->my_qyery($cpu_query);

        while ($row = mysqli_fetch_assoc($cpu_result)) {
            //  print_r($row);
            $cpu_arr[] = $row;
        }
        return $cpu_arr;
    }

}
