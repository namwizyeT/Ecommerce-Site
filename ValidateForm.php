<!DOCTYPE html>
<html>
    <head>
        <title>Friends|Family|Form</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script type="text/javascript">

            function submitForm(i) {

                var flag = 0
                var ErrMessage = ""
                var fname = document.getElementById("first_name").value
                var lname = document.getElementById("last_name").value
                var phone = document.getElementById("phone_num").value
                var address = document.getElementById("address").value
                var city = document.getElementById("city").value
                var zip = document.getElementById("zip").value
                var username = document.getElementById("username").value
                var password = document.getElementById("password").value
                var relationship = document.getElementById("relationship").value

                var letters = /^[a-zA-Z]+$/
                var numbers = /^[0-9]+$/

                //alerts users if first name or last name is blank
                if (i == 1 || i == 2 || i == 3) {
                    if (fname == "" || fname == null)
                    {
                        ErrMessage = ErrMessage + "First Name is blank"
                        flag = 1
                    }

                    if (lname == "" || lname == null)
                    {
                        ErrMessage = ErrMessage + "\nLast Name is blank"
                        flag = 1
                    }
                    //alerts user if values for first and last name have characters other than letters
                     if (!(fname.match(letters) && lname.match(letters))) 
                     {
                     ErrMessage = ErrMessage + "\nPlease Use Letters Only For Name Fields"
                     flag = 1
                     }
                     //alerts users if value for phone number is not numeric
                     if (!(phone.match(numbers))) {
                  
                     ErrMessage = ErrMessage + "\nPlease Make Sure Your Phone Number is Numeric"
                     flag = 1
                     }

                    while (flag == 1)
                    {
                        alert(ErrMessage)
                        return false
                    }
                    
                }
                

                if (i == 1 || i == 3) {
                 if (phone == "" || phone == null)
                 {
                 flag = 2
                 }
                 if (address == "" || address == null)
                 {
                 flag = 2
                 }
                 if (city == "" || city == null){
                 flag = 2
                 }
                 if (zip == "" || zip == null){
                 flag = 2
                 }
                 if (username == "" ||username == null){
                 flag = 2
                 }
                 if (password == "" || password == null){
                 flag = 2
                 }
                 
                 while(flag == 2){
                 alert("Please fill out the form completely")
                 return false
                 }
                
            }
        document.friendsFamily.submit();
            }



        </script>
    </head>
    <body>
        <?php include "Menu.php" ?>
        <table>
            <tr><td>Please Fill Out Form</td></tr>
        </table>

        <form method="post" action="ValidateResults.php" name="friendsFamily">
            <table>
                <tr>
                    <td>First Name</td>
                    <td><input type="text" name="first_name" id="first_name"></td>
                </tr>
                <tr>
                    <td>Last Name</td>
                    <td><input type="text" name="last_name" id="last_name"></td>
                </tr>
                <tr>
                    <td>Phone Number</td>
                    <td><input type="text" name="phone_num" placeholder="XXX-XXX-XXXX" id="phone_num"></td>
                </tr>
                <tr>
                    <td>Address</td>
                    <td><input type="text" name="address" id="address" onkeyup="enableDisabled()"></td>
                </tr>
                <tr>
                    <td>City</td>
                    <td><input type="text" name="city" id="city"></td>
                </tr>
                <tr>
                    <td>State</td>
                    <td><select name="state" id="state">
                            <option value="AL">Alabama</option>
                            <option value="AK">Alaska</option>
                            <option value="AZ">Arizona</option>
                            <option value="AR">Arkansas</option>
                            <option value="CA">California</option>
                            <option value="CO">Colorado</option>
                            <option value="CT">Connecticut</option>
                            <option value="DE">Delaware</option>
                            <option value="DC">District Of Columbia</option>
                            <option value="FL">Florida</option>
                            <option value="GA">Georgia</option>
                            <option value="HI">Hawaii</option>
                            <option value="ID">Idaho</option>
                            <option value="IL">Illinois</option>
                            <option value="IN">Indiana</option>
                            <option value="IA">Iowa</option>
                            <option value="KS">Kansas</option>
                            <option value="KY">Kentucky</option>
                            <option value="LA">Louisiana</option>
                            <option value="ME">Maine</option>
                            <option value="MD">Maryland</option>
                            <option value="MA">Massachusetts</option>
                            <option value="MI">Michigan</option>
                            <option value="MN">Minnesota</option>
                            <option value="MS">Mississippi</option>
                            <option value="MO">Missouri</option>
                            <option value="MT">Montana</option>
                            <option value="NE">Nebraska</option>
                            <option value="NV">Nevada</option>
                            <option value="NH">New Hampshire</option>
                            <option value="NJ">New Jersey</option>
                            <option value="NM">New Mexico</option>
                            <option value="NY">New York</option>
                            <option value="NC">North Carolina</option>
                            <option value="ND">North Dakota</option>
                            <option value="OH">Ohio</option>
                            <option value="OK">Oklahoma</option>
                            <option value="OR">Oregon</option>
                            <option value="PA">Pennsylvania</option>
                            <option value="RI">Rhode Island</option>
                            <option value="SC">South Carolina</option>
                            <option value="SD">South Dakota</option>
                            <option value="TN">Tennessee</option>
                            <option value="TX">Texas</option>
                            <option value="UT">Utah</option>
                            <option value="VT">Vermont</option>
                            <option value="VA">Virginia</option>
                            <option value="WA">Washington</option>
                            <option value="WV">West Virginia</option>
                            <option value="WI">Wisconsin</option>
                            <option value="WY">Wyoming</option>
                        </select>				
                    </td>
                </tr>
                <tr>
                    <td>Zip</td>
                    <td><input type="text" name="zip" id="zip"></td>
                </tr>
                <tr>
                    <td>Birthdate</td>
                    <td>
                        <select name="month" id="month">
                            <option value="January" >1</option>
                            <option value="February">2</option>
                            <option value="March">3</option>
                            <option value="April">4</option>
                            <option value="May">5</option>
                            <option value="June">6</option>
                            <option value="July">7</option>
                            <option value="August">8</option>
                            <option value="September">9</option>
                            <option value="October">10</option>
                            <option value="November">11</option>
                            <option value="December">12</option>
                        </select>


                        <select name="day" id="day">
                            <?php
                            for ($d = 1; $d < 32; $d++) {
                                printf("<option value=%d>%d<option>", $d, $d);
                            }
                            ?>
                        </select>

                        <select name="year" id="year">
                            <?php
                            for ($y = Date('Y'); $y > 1915; $y--) {
                                printf("<option value=%d>%d<option>", $y, $y);
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Username</td>
                    <td><input type="text" name="username" id="username"></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" name="password" id="password"></td>
                </tr>
                <tr>
                    <td>Sex</td>
                    <td>Male <input type="radio" name="sex" value="m" id="sex" checked> Female <input type="radio" name="sex" value="f" id="sex"></td>
                </tr>
                <tr>
                    <td>Relationship</td>
                    <td>
                        <select name="relationship" id="relationship">
                            <option name = "relationship">Grandparent</option>
                            <option name = "relationship">Parent</option>
                            <option name = "relationship">Sibling</option>
                            <option name = "relationship">Other Family</option>
                            <option name = "relationship">Friend</option>
                            <option name = "relationship">Co-worker</option>
                            <option name = "relationship">Employer</option>
                            <option name = "relationship">Enemy</option>
                        </select>
                    </td>
                </tr>
            </table>
            <br>
            <!--insert buttons for update, search and create-->
            <input type = "submit" name = "action" value ="update"  onclick="return submitForm(1)">
            <input type = "submit" name = "action" value = "search"  onclick="return submitForm(2)">
            <input type = "submit" name = "action" value="create"  onclick="return submitForm(3)">

            <input type="hidden" name="id" value="id">
        </form>
    </body>
</html>