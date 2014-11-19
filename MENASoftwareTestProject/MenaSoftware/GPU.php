<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace MenaSoftware;

/**
 * Description of GPU
 *
 * @author Mupo
 */
class GPU {

    //put your code here

    //SELECT ONE GPU  FROM DB WHIT ID
    public static function SelectGPU($id , $con) {
        $product_id = htmlspecialchars($id);

        $gpu = array();
        $gpu_query = "SELECT * FROM gpu WHERE gpu_id =" . $product_id;
        $gpu_result = $con->my_qyery($gpu_query);
        while ($row = mysqli_fetch_assoc($gpu_result)) {

            $gpu = $row;
        }
        
        return $gpu;
    }

    //GET ALL GPU's FROM DB
    public static function GetAllGPUs($con) {
        $gpu_arr = array();

        $gpu_query = "SELECT gpu_name,gpu_id FROM `gpu`";
        $gpu_result = $con->my_qyery($gpu_query);

        while ($row = mysqli_fetch_assoc($gpu_result)) {
            //  print_r($row);
            $gpu_arr[] = $row;
        }
        
        return $gpu_arr;
    }

}
