<!DOCTYPE html>
<?php
session_start();
?>
<html>
    <head>
        <title>Catalogue</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <?php
        include "Menu.php";
        require_once 'databaselogin.php'; //database connection

        echo "Please select one of our items: <br><br>";
        $itemQuery = "SELECT * FROM Products"; //query selects all products and product info from database
        $itemResult = $conn->query($itemQuery);

        if(!itemResult)
        {
            die("Product List Unavailable <br>" . $conn->error);
        } else
        {
            ?><form name="catalogueForm" method="post">

                <select name="item"> <?php
                    //results for product name and product id from database populate select tag value and option
                    while($rowItem = mysqli_fetch_array($itemResult))
                    {
                        ?>
                        <option value="<?php echo $rowItem['ProductId']; ?>"><?php echo $rowItem['Name']; ?></option>
                    <?php
                }
                ?>
                </select><?php
        }
            ?>
            <br>
            <br>
            <!--submit options-->
            <input type="submit" name="action" value="Add">
            <input type="submit" name="action" value="Remove">
            <input type="submit" name="action" value="Empty">
            <input type="submit" name="action" value="Info">
        </form>
        <br><br>
        <?php
        //form posts to same page, actions after submit is set
        if(isset($_POST['action']))
        {

            //submit option and selected item posted
            $action = htmlentities($_POST['action']);
            $itemId = htmlentities($_POST['item']);
            //database connection
            require_once 'databaselogin.php';

            //switch condition depending on submit option
            switch ($action) {

                case "Add":

                    //increment selected item by one during session
                    $_SESSION['cart'][$itemId] ++;
                    break;

                case "Remove":

                    //decrement selected item by one and removes all session variables when items are zero
                    $_SESSION['cart'][$itemId] --;
                    if($_SESSION['cart'][$itemId] == 0)
                    {
                        unset($_SESSION['cart'][$itemId]);
                    }

                    break;
                //remove all session variables
                case "Empty":

                    unset($_SESSION['cart']);
                    break;

                case "Info":
                //get product info for selected product
                    $getInfo = "SELECT * FROM Products WHERE ProductId = '$itemId'";
                    $info = $conn->query($getInfo);
                    if(!$info)
                    {
                        die("Cannot retrieve product info" . $conn->error);
                    } else
                    {
                        while($infoResult = mysqli_fetch_array($info))
                        {
                        //product fields from query result are assigned variables
                            $name = $infoResult['Name'];
                            $description = $infoResult['Description'];
                            $price = $infoResult['Price'];
                        //results are displayed as echoed variables
                            echo "<strong>Name: </strong>" . $name;
                            echo '<br>';
                            echo "<strong>Description: </strong>" . $description;
                            echo '<br>';
                            echo "<strong>Price: $</strong>" . $price;
                            echo '<br>';
                            //image corresponding to selected productId are displayed
                            echo "<img src=\"images/$itemId.jpg\" height=\"100\" width=\"100\">";
                        }
                    }

                    break;
                default :
                    echo "No option has been chosen";
            }
            //check if cart is empty
            if($_SESSION['cart'])
            {

                echo"<table width=\"100%\">
            <tr>
            <th align=\"left\" width=\"200\">Name</th>
            <th align=\"left\" width=\"1000\">Description</th>
            <th align=\"left\" width=\"200\">Quantity</th>
            <th align=\"left\" width=\"200\">Price</th>
            <th align=\"left\" width=\"200\">Subtotal</th>
            </tr>
            <tr>
            </table>";
                //loop through session array to assign position value to variable $quantity
                foreach($_SESSION['cart'] as $itemId => $quantity)
                {

                    //get product info for selected product
                    $cartQuery = "SELECT Name, Description, Price FROM Products WHERE ProductId = '$itemId'";
                    $cartResult = $conn->query($cartQuery);
                    //variable names assigned to query results
                    list($cartName, $cartDescription, $cartPrice) = mysqli_fetch_row($cartResult);
                    //total cost per product calculated using $quantity variable and price from cartQuery result
                    $linecost = $quantity * $cartPrice;
                    //total cost for all products calculated as sum of all linecosts
                    $total = $total + $linecost;
                    //table displays resulting variables
                    echo
                    "<table width=\"100%\">
            <tr>
                <td align=\"left\" width=\"200\">$cartName</td>
                <td align=\"left\" width=\"1000\">$cartDescription</td>
                <td align=\"left\" width=\"200\">$quantity</td>
                <td align=\"left\" width=\"200\">$$cartPrice</td>
                <td align=\"left\" width=\"200\">";
                    printf("$%d.00", $linecost);
                    echo"</td>
        </tr>
        </table>";
                }
            //total displated outside foreach to avoid repetition
                echo" <table width=\"100%\"> <tr>
                <td width=\"200\"></td>
                <td width=\"1000\"></td>
                <td width=\"200\"></td>
                <th align =\"left\" width=\"200\">Total:</th>
                <td width=\"200\">";
                printf("$ %d.00", $total);
                echo "</td>
            </tr>
            </table>";
            } else
            {
                //if session is unset/cart is empty, message notifies user
                echo "<br><br><br><br><br> You have no items in your shopping cart";
            }
        }
        ?>
    </body>
</html>
