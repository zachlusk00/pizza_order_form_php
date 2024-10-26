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
https://stackoverflow.com/questions/45454327/how-to-stop-execution-of-php-script-when-a-certain-condition-is-met-in-if-statem - I found this article that talked
about using die() to stop a php script. (This was used to stop and display an error message if information is missing)
https://www.w3schools.com/php/func_string_strtoupper.asp - this was used to convert strings to uppercase
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>Pizza Byte</title>
</head>
<body>
    <!--Main Form-->
    <form class="fform" action="action_page.php" method="POST">
        <!--Heading Div-->
        <div class="header">
            <!--Title Div-->
            <div class="title">
                <div class="logo">
                    <img src="imgs/pizza_byte_logo.png"> <!--LOGO-->
                </div>
                <div class="name">
                    <h1>Online Ordering<br>Form</h1> <!--Company Name-->
                </div>
                <div class="logo">
                    <img src="imgs/delivery_logo.png"> <!--Delivery LOGO-->
                </div>
            </div>
            <hr>
            <p>Required values are marked by an asterisk (*)</p>
        </div>
        <!--FORM Div-->
        <div class="pizza_form">
            <!--CUSTOMER INFORMATION SECTION-->
            <fieldset class="customer_information_form">
                <legend>Customer Information</legend>
                <!--Customer Options Div-->
                <div class="customer_options">
                    <!--Customer Options Lables-->
                    <div class="options3">
                        <label for="fname">First Name *</label>
                        <label for="lname">Last Name *</label>
                        <label for="location">Delivery Location *</label>
                        <label for="phonenumber">Phone Number *</label>
                        <label for="delivery_time">Delivery Time</label>
                    </div>
                    <!--Customer Options Inputs-->
                    <div class="options3">
                        <input type="text" id="fname" name="fname">
                        <input type="text" id="lname" name="lname">
                        <input type="text" id="location" name="location">
                        <input type="text" id="phonenumber" name="phonenumber">
                        <input type="text" id="delivery_time" name="delivery_time">
                    </div>
                </div>
            </fieldset>
            <!--Pizza Customization Section-->
            <fieldset class="customize_pizza">
                <legend>Customize Your Pizza</legend>
                <!--Customize Pizza Div-->
                <div class="customize">
                    <!--Pizza Customization Labels-->
                    <div class="options1">
                        <label>Crust Size *</label>
                        <label for="crust_options">Choose your Crust</label>
                        <label for="quantity_options">Quantity<br>(Call for quantities larger than 10)</label>
                        <label for="instruction">Special Instructions</label>
                    </div>
                    <!--Pizza Customization Inputs (Radio Buttons/DropDown/TextArea)-->
                    <div class="options2">
                        <!--Radio Buttons-->
                        <div class="radio">
                            <div class="radio_item">
                                <div class="circle">
                                    <span class="circle_10">10</span>
                                </div>
                                <div class="buttons">
                                    <input type="radio" name="crust_size" value="10" id="crust_size_10">
                                </div>
                            </div>
                            <div class="radio_item">
                                <div class="circle">
                                    <span class="circle_12">12</span>
                                </div>
                                <div class="buttons">
                                    <input type="radio" name="crust_size" value="12" id="crust_size_12">
                                </div>
                            </div>
                            <div class="radio_item">
                                <div class="circle">
                                    <span class="circle_14">14</span>
                                </div>
                                <div class="buttons">
                                    <input type="radio" name="crust_size" value="14" id="crust_size_14">
                                </div>
                            </div>
                        </div>
                        <!--Dropdowns-->
                        <select class="spacer" name="crust_options" id="crust_options">
                            <option value="Thin Crust">Thin</option>
                            <option value="Pan Style">Pan Style</option>
                            <option value="Hand Tossed">Hand Tossed</option>
                            <option value="Detroit Style">Detroit Style</option>
                        </select>
                        <!--Number Input-->
                        <input class="spacer" class="quantity_amount" type="number" id="quantity_options" name="quantity_options" value="1" min="1" max="9">
                        <!--Text Area-->
                        <textarea class="spacer"  class="instruction" id="instruction" name="instruction" rows="6" cols="30" placeholder="Type Instructions Here..."></textarea>
                    </div>
                </div>
                <!--Toppings Section-->
                <div class="toppings">
                    <!--Meat Section-->
                    <fieldset class="meat">
                        <legend>Meat Toppings</legend>
                        <!--Meat Toppings Labels-->
                        <div class="options">
                            <label for="pepperoni">Pepperoni</label>
                            <label for="ham">Ham</label>
                            <label for="pork">Pork</label>
                            <label for="sausage">Sausage</label>
                            <label for="chicken">Chicken</label>
                        </div>
                        <!--Meat Toppings Inputs (Checkboxes)-->
                        <div class="options">
                            <input type="checkbox" id="pepperoni" name="toppings[]" value="Pepperoni">
                            <input type="checkbox" id="ham" name="toppings[]" value="Ham">
                            <input type="checkbox" id="pork" name="toppings[]" value="Pork">
                            <input type="checkbox" id="sausage" name="toppings[]" value="Sausage">
                            <input type="checkbox" id="chicken" name="toppings[]" value="Chicken">
                        </div> 
                    </fieldset>
                    <!--Vegitables Section-->
                    <fieldset class="vegitables">
                    <legend>Vegetable Toppings</legend>
                        <!--Vegetable Toppings Labels-->
                        <div class="options">
                            <label for="mushrooms">Mushrooms</label>
                            <label for="green_peppers">Green Peppers</label>
                            <label for="onions">Onions</label>
                            <label for="tomatoes">Tomatoes</label>
                            <label for="jalapenos">Jalapenos</label>
                        </div>
                        <!--Vegetable Toppings Inputs (Checkboxes)-->
                        <div class="options">
                            <input type="checkbox" id="mushrooms" name="toppings[]" value="Mushrooms">
                            <input type="checkbox" id="green_peppers" name="toppings[]" value="Green Peppers">
                            <input type="checkbox" id="onions" name="toppings[]" value="Onions">
                            <input type="checkbox" id="tomatoes" name="toppings[]" value="Tomatoes">
                            <input type="checkbox" id="jalapenos" name="toppings[]" value="Jalapenos">
                        </div> 
                    </fieldset>
                </div>
                <!--Extra Toppings Section-->
                <div class="extra_toppings">
                    <!--Extra Toppings Labels-->
                    <div class="options">
                        <label for="double_cheese">Double Cheese</label>
                        <label for="double_sauce">Double Sauce</label>
                    </div>
                    <!--Extra Toppings Inputs (Checkboxes)-->
                    <div class="options">
                        <input type="checkbox" id="double_cheese" name="toppings[]" value="Double Cheese">
                        <input type="checkbox" id="double_sauce" name="toppings[]" value="Double Sauce">
                    </div> 
                </div>

            </fieldset>
        </div>
        <!--Submit Section-->
        <div class="submit">
            <div class="submit_style">
                <input type="submit" value="Submit"> <!--Submit Button (SENDS ALL FORM INFORMATION TO ACTION_PAGE.PHP)-->
                <p>Thank you for using our online ordering form for quick and easy orders, delivered free, fast,
                    and how to your door. If you need to talk to us directly, call Pizza Byte at (302) 555-7599
                </p>
                <hr>
                <p>Pizza Byte * 123 Market Street * Milltown, DE 19000 * (302) 555-7599</p>
            </div>
        </div>
    <!--End of Form-->
    </form>
</body>
</html>