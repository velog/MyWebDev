/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(window).load(function () {


    //RESET ALL FIELDS
    $('.products').prop('selectedIndex', 0);
    $('#cpu_quantity').val(1);
    $('#gpu_quantity').val(1);
    $('#ram_quantity').val(1);

    //CHANGE THE PRICE OF THE PRODUCT
    $('.products').change(function () {
        var group = $(this).attr('name');
        var product_id = $(this).val();
        // alert(group);

        $.ajax({
            type: "POST",
            url: "./responde/responde.php",
            data: {category: group, id: product_id}
        }).done(function (msg) {

            $('#' + group + '_price').text(msg + '$');

            var sum = SumTheRrices();

            $('#full_price').text(sum);


        });
    });


    $('.quantity').keyup(function () {

        //INFORMATION
        var quantity_req = $(this).val();
        var category_req = $(this).attr('id');
        var id_req;

        //GET ID FOR ELEMENT FOR CHECK QUANTITY
        switch (category_req) {
            case 'gpu_quantity':
                id_req = $('#gpu_select').val();
                break;
            case 'cpu_quantity':
                id_req = $('#cpu_select').val();
                break;
            case 'ram_quantity':
                id_req = $('#ram_select').val();
                break;
        }

        //CHEK IF THERE IS SELECTED PRODUCT
        if (id_req === null) {
            $('#quantity').text('Please select product');
            $('#' + category_req).val(1);
            return 0;
        } else {

            var sum = SumTheRrices();
            if (sum) {
                $('#full_price').text(sum);
            }


            //AJAX REQUST FOR QUANTITUS IF PRODUCT
            $.ajax({
                type: 'POST',
                url: "./responde/responde.php",
                data: {category: category_req, quatity: quantity_req, id: id_req}
            }).done(function (msg) {
                //CHECK FOR ERROR FOR QUANTITYS ARE THY MORE 
                if (msg === 'false') {
                    $('#quantity').text('');
                } else {
                    var p_quantity = parseInt(msg);

                    $('#quantity').text('We have only ' + msg + ' units . Please enter smaller quantity.');
                    $('#' + category_req).val(p_quantity);
                }
            });
        }
    });

    //SUM ALL GROUPSE
    function SumTheRrices() {



        //CHEKING IF THERE IS STRING IN QUANTITI FIELD  AND IN PRICE AND THEN SUM PRICE FOR ALL RPODUCT
        if (isNaN($('#gpu_quantity').val()) && isNaN($('#gpu_price').text())) {
            console.log('Enter number not text in GPU quantity field.');
            $('#gpu_errors').text('Enter number not text in GPU quantity field.');
            $('#gpu_quantity').val(1);
            var gpu_error = true;
        } else {
            $('#gpu_errors').text('');
            var sum_gpu = parseFloat($('#gpu_quantity').val()) * parseFloat($('#gpu_price').text());

        }

        if (isNaN($('#cpu_quantity').val()) && isNaN($('#cpu_price').text())) {
            $('#cpu_errors').text('Enter number not text in CPU quantity field.');
            $('#cpu_quantity').val(1);
            var cpu_error = true;
        } else {
            $('#cpu_errors').text('');
            var sum_cpu = parseFloat($('#cpu_quantity').val()) * parseFloat($('#cpu_price').text());

        }

        if (isNaN($('#ram_quantity').val()) && isNaN($('#ram_price').text())) {
            $('#ram_errors').text('Enter number not text in RAM quantity field.');
            $('#ram_quantity').val(1);
            var ram_error = true;
        } else {
            $('#ram_errors').text('');
            var sum_ram = parseFloat($('#ram_quantity').val()) * parseFloat($('#ram_price').text());
        }

        //IF THERE ARE STRING IN FIELDS SET FULL PRICE TO 0 OR NOT SELECTED PRODUCT
        if (cpu_error === true || isNaN(sum_cpu)) {
            sum_cpu = 0;

        }
        if (gpu_error === true || isNaN(sum_gpu)) {
            sum_gpu = 0;
        }
        if (ram_error === true || isNaN(sum_ram)) {
            sum_ram = 0;
        }
//                    console.log(sum_cpu);
//                    console.log(sum_gpu);
//                    console.log(sum_ram);


        //SUM HOLE SUM OF ORDER
        var sum = sum_cpu + sum_gpu + sum_ram;
        var fixed_sum = sum.toFixed(2) + '$';

        //RETURN THE PRICE 
        if (sum === 0) {
            return 'Full Price';
        } else {
            return fixed_sum;
        }
    }
});


