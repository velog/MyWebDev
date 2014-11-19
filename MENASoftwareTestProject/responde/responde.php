<?php

include '../MenaSoftware/db.php';
include '../MenaSoftware/CPU.php';
include '../MenaSoftware/GPU.php';
include '../MenaSoftware/RAM.php';

$db_con = new \MenaSoftware\DB();

//Check is Post request
if (isset($_POST)) {

    //Check is varable set

    if (isset($_POST['category']) && isset($_POST['id'])) {

        //CHECK is for gpu and send information for it
        if ($_POST['category'] == "gpu") {
            $id = htmlspecialchars($_POST['id']);
            $gpu = MenaSoftware\GPU::SelectGPU($id, $db_con);
            echo $gpu['gpu_price'];
        }

        if ($_POST['category'] == "cpu") {
            $id = htmlspecialchars($_POST['id']);
            $cpu = MenaSoftware\CPU::SelectCPU($id, $db_con);
            echo $cpu['cpu_price'];
        }


        if ($_POST['category'] == "ram") {

            $id = htmlspecialchars($_POST['id']);
            $ram = MenaSoftware\RAM::SelectRAM($id, $db_con);
            echo $ram['ram_price'];
        }
    }

    if (isset($_POST['category']) && isset($_POST['id']) && isset($_POST['quatity'])) {
        $category = $_POST['category'];
        $quatity = $_POST['quatity'];
        $id = $_POST['id'];
        $product;
            
        //echo $quatity;

        switch ($category) {
            case "gpu_quantity":
                $product = MenaSoftware\GPU::SelectGPU($id, $db_con)['gpu_quantity'];
                break;
            case "cpu_quantity":
                $product = MenaSoftware\CPU::SelectCPU($id, $db_con)['cpu_quantity'];
                break;
            case "ram_quantity":
                $product = MenaSoftware\RAM::SelectRAM($id, $db_con)['ram_quantity'];
                break;
        }
        if ($product < $quatity) {
            echo $product;
        } else {
            echo 'false';
        }
    }
}