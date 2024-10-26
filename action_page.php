<!--
Name: Zachary Lusk
Date: 10/22/2024
Assignment: Module 8: Project 2 Pizza Byte

HTML Resources:
https://www.w3schools.com/tags/att_input_type_checkbox.asp - Used to make checkboxes
https://www.w3schools.com/tags/att_input_type_radio.asp - Used to create radio buttons
https://www.w3schools.com/tags/tag_select.asp - Used to create dropdown menu
https://www.w3schools.com/tags/att_form_action.asp - used to create form with submit button
https://www.w3schools.com/howto/howto_css_circles.asp - used to create circles for the radio buttons crust size

PHP Resources:
https://www.php.net/manual/en/function.isset.php - Used for determing if a variable exists in POST (Used to check if the toppings array is being sent or not)
https://stackoverflow.com/questions/45454327/how-to-stop-execution-of-php-script-when-a-certain-condition-is-met-in-if-statem - I found this post that talked
about using die() to stop a php script. (This was used to stop and display an error message if information is missing)
https://www.w3schools.com/php/func_string_strtoupper.asp - this was used to convert strings to uppercase
-->
<?php
$fname = trim(htmlspecialchars(strtoupper($_POST['fname']))); // gets first name variable
$lname = trim(htmlspecialchars(strtoupper($_POST['lname']))); // gets last name variable
$location = trim(htmlspecialchars(strtoupper($_POST['location']))); // gets delivery location variable
$time = trim(htmlspecialchars($_POST['delivery_time'])); // gets delivery time variable
$phone = trim(htmlspecialchars($_POST['phonenumber'])); // gets phone number variable
$crust_options = trim(htmlspecialchars($_POST['crust_options'])); // gets crust option variable
$quantity_options = trim(htmlspecialchars($_POST['quantity_options'])); // gets quantity variable
$instruction = trim(htmlspecialchars($_POST['instruction'])); // gets instruction variable

// if FirstName, Lastname, Delivery Location, or PhoneNumber is missing
if( empty($_POST['fname']) || empty($_POST['lname']) || empty($_POST['location']) || empty($_POST['phonenumber']) ) {
    die("ERROR: MISSING REQUIRED CUSTOMER INFORMATION"); // QUIT SCRIPT with error message
}
// if crust_size radio array is missing
if(!isset($_POST['crust_size'])) {
    die("ERROR: MISSING REQUIRED CRUST SIZE"); // QUIT SCRIPT with error message
}
// if crust_size radio array exists
else {
    $crust_size = trim(htmlspecialchars($_POST['crust_size'])); // get crust size variable from crust size array
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/receipt.css">
    <title>Pizza Byte Receipt</title>
</head>
<body>
    <!--Main Receipt Div-->
    <div class="receipt">
        <!--Content Div-->
        <div class="content">
            <!--Title Div-->
            <div class="title">
                <img src="imgs/pizza_byte_logo.png">
                <h1>Order Receipt</h1>
                <hr>
            </div>
            <h2>Customer Information</h2>
            <!--Customer Information Div-->
            <div class="customer_information">
                <div class="left">
                    <?php
                        // Displays Customer Information Titles
                        echo("<p><strong>Name: </strong></p>");
                        echo("<p><strong>Delivery Address: </strong></p>");
                        echo("<p><strong>Phone Number: </strong></p>");
                        echo("<p><strong>Delivery Time: </strong></p>");
                    ?>
                </div>
                <div class="right">
                    <?php
                        // Displays Customer Information Inputs
                        echo("<p>$lname, $fname</p>");
                        echo("<p>$location</p>");
                        echo("<p>$phone</p>");
                        if (empty($time)) {
                            echo("<p>ASAP</p>");
                        }
                        else {
                            echo("<p>$time</p>");
                        }
                    ?>
                </div>
            </div>
            <hr>
            <h2>Order Information</h2>
            <!--Pizza Information Div-->
            <div class="pizza_information">
                <div class="left">
                    <?php
                        // Displays Pizza Information Titles
                        echo("<p><strong>Crust Size: </strong></p>");
                        echo("<p><strong>Crust Type: </strong></p>");
                        echo("<p><strong>Quantity: </strong></p>");
                        echo("<p><strong>Instructions: </strong></p>");
                        echo("<p><strong>Toppings: </strong></p>");
                    ?>
                </div>
                <div class="right">
                    <?php
                        // Displays Pizza Information Selections
                        echo("<p>$crust_size</p>");
                        echo("<p>$crust_options</p>");
                        echo("<p>$quantity_options</p>");
                        if (empty($instruction)) {
                            echo ("<p>No Instructions</p>");
                        }
                        else {
                            echo("<p>$instruction</p>");
                        }
                        // If Toppings array does not exist
                        if(!isset($_POST['toppings'])) {
                            $toppings = "No Toppings"; 
                            echo($toppings);// Output No Toppings
                        }
                        // If Toppings array does exist
                        else {
                            $toppings = $_POST['toppings']; // get toppings
                            // Display every topping selected
                            foreach ($toppings as $topping) {
                                echo($topping . "<br>");
                            } 
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>