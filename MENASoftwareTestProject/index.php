<?php
include './MenaSoftware/db.php';
include './MenaSoftware/CPU.php';
include './MenaSoftware/GPU.php';
include './MenaSoftware/RAM.php';


$mysqli = new \MenaSoftware\DB();


$gpu_arr = \MenaSoftware\GPU::GetAllGPUs($mysqli);
$ram_arr = \MenaSoftware\RAM::GetAllRAMs($mysqli);
$cpu_arr = \MenaSoftware\CPU::GetAllCPUs($mysqli);


//echo '<pre>';
//print_r($ram_arr);
//echo '</pre>';
?>


<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title> MENA Software Test Project</title>
        <link type="text/css" rel="stylesheet" href="style/css.css" />
        <script type="text/javascript" src="script/jquery.js" ></script>
        <script type="text/javascript" src="script/js.js" ></script>
    </head>
    <body>
        <table >
            <tr id="header_row">
                <th>Groups</th>
                <th>Name</th>
                <th>Quantity</th>
                <th>Price</th>
            </tr>
            <tr>
                <td>GPU</td>
                <td>
                    <select class="products" name="gpu" id="gpu_select">
                        <option  value="-1" selected disabled>Select GPU ...</option>
                        <?php
                        foreach ($gpu_arr as $gpu) {
                            echo '<option value="' . $gpu['gpu_id'] . '">' . $gpu['gpu_name'] . '</option>';
                        }
                        ?>
                    </select>
                </td>
                <td>
                    <input type="text" value="1"  class="quantity" id="gpu_quantity" />
                </td>
                <td>
                    <span id="gpu_price"> Select item to see the price.</span>
                </td>
            </tr>
            <tr>
                <td>CPU</td>
                <td>
                    <select class="products" name="cpu" id="cpu_select">
                        <option value="-1" selected disabled>Select CPU ...</option>
                        <?php
                        foreach ($cpu_arr as $cpu) {
                            echo '<option value="' . $cpu['cpu_id'] . '">' . $cpu['cpu_name'] . '</option>';
                        }
                        ?>
                    </select>
                </td>
                <td>
                    <input type="text" value="1" class="quantity" name="cpu_quantity" id="cpu_quantity" />
                </td>
                <td >
                    <span id="cpu_price" name="cpu_rpice"> Select item to see the price.</span>
                </td>
            </tr>
            <tr>
                <td>RAM</td>
                <td>
                    <select class="products" name="ram" id="ram_select">
                        <option value="-1"  selected disabled>Select RAM ...</option>
                        <?php
                        foreach ($ram_arr as $ram) {
                            echo '<option value="' . $ram['ram_id'] . '">' . $ram['ram_name'] . '</option>';
                        }
                        ?>
                    </select>
                </td>
                <td>
                    <input type="text" value="1" class="quantity" id="ram_quantity" />
                </td>
                <td >
                    <span id="ram_price"> Select item to see the price.</span>
                </td>
            </tr>
            <tr id="bottom_row">
                <td></td>
                <td></td>
                <td></td>
                <td><span id="full_price">Full Price</span></td>
            </tr>
        </table>
        <div id="errors">
            <span id="gpu_errors"></span>
            <span id="cpu_errors"></span>
            <span id="ram_errors"></span>
            <span id="quantity"></span>
        </div>
    </body>
</html>
