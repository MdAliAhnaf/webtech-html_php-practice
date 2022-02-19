<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Registration Form</title>
</head>
<body>

<?php 
		
if ($_SERVER['REQUEST_METHOD'] === "POST") 
{
			
			function test_input($data) 
			{
				$data = trim($data);
				$data = stripslashes($data);
				$data = htmlspecialchars($data);
				return $data;
			}

			
			$firstname = test_input($_POST["First_Name"]);
			if(empty($firstname))
            {
                echo "Please fill up your First name<br>";
            }
            else 
            {
                echo "First Name: " . $firstname ."<br>";
            }

			$lastname = test_input($_POST["Last_Name"]);
			if(empty($lastname))
            {
                echo "<br>Please fill up your Last name<br>";
            }
            else 
            {
                echo "Last Name:" .$lastname."<br>";
            }

               
			 //$Gender = test_input($_POST["gender"]);
			if(empty($_POST["gender"]))
			{
                 echo "Please choose your Gender <NO INPUT> <br>"; 
			}
			else if(test_input($_POST["gender"])==="Male"||"Female"||"Transgender") 
			{
                 echo "<br>Your Gender is: " .test_input($_POST["gender"])."<br>";  
			}

			$DOB = test_input($_POST["birthday"]);
			if(empty($DOB))
			{
                 echo "Please enter your Date of Birth <NO INPUT> <br>"; 
			}
			else if (!preg_match("/^(0?[1-9]|[12][0-9]|3[01])\/\.- \/\.- \d{2}$/", $DOB))
            {
                 echo "<br>Your Date of Birth is: " .$DOB ."<br>";  
            }


			$Religion = test_input($_POST["religion"]);
			if(empty($Religion))
			{
                 echo "Please select your Religion <NO INPUT> <br>"; 
			}
			else if($Religion==="Islam"||"Christianity"||"N/A"||"Hinduism" ||"Buddhism" ||"Folk religions" ||"Sikhism" || "Judaism")
            {
                echo "<br>Your Religion is: " .$Religion ."<br>";  
            }

			$preadd = test_input($_POST["pre_address"]);
			if(empty($preadd))
			{
                 echo "Please fill up your current address <NO INPUT> <br>"; 
			}
			else
			{
                 echo "<br>Your Current Address is: " .$preadd."<br>";  
			}


			$peradd = test_input($_POST["per_address"]);
			if(empty($peradd))
			{
                 echo "Please fill up your permanent address <NO INPUT> <br>"; 
			}
			else
			{
                 echo "<br>Your Permanent Address is: " .$peradd."<br>";  
			}

			$phone = test_input($_POST["Phone"]);
			if(empty($phone))
			{
               echo "Please fill up the field with your valid phone number <NO INPUT> <br>"; 
			}
			else if (preg_match("/^[0-9]{3}[0-9]{4}[0-9]{4}$/", $phone))
			{
              echo "<br>Your Phone Number is: " .$phone."<br>"; 
			}
			else
			{
				echo "Invalid phone number or it does not contains 11 digits<br>"; 
			}

			$email = test_input($_POST["Email"]);
			if(empty($email))
			{
               echo "Please fill up the field with your valid email <NO INPUT> <br>"; 
			}
			else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
			{
            echo "Invalid email format<br>";
            }
            else
            {
            	echo "<br>Your Email is: " .$email."<br>";  
            }


			$userurl = test_input($_POST["p_link"]);
			if(empty($userurl))
			{
               echo "Please fill up the field with your personal website's URL <NO INPUT> <br>"; 
			}
			else if (filter_var($userurl, FILTER_VALIDATE_URL))
			{
              echo "<br>Your Personal Website Link: " .$userurl."<br>"; 
			}
			
			
			$Username = test_input($_POST["username"]);
            if(empty($Username))
            {
                echo "Please fill up your Username<br>";
            }
            else if(strlen($Username)>6)
            {
                $Username = substr($Username,0,5);
                echo "Username is: "."$Username"."<br>";
            }

           //$password = test_input($_POST["password"]);
           //$cpassword = test_input($_POST["cpassword"]);

           if(empty($_POST["password"])) 
           {
            echo "Please fill up the password"; 
           }
           
           if(!empty($_POST["password"]) && ($_POST["password"] == $_POST["cpassword"])) 
           echo "Password matches & Validates";
           {

           if(!empty($_POST["password"]) && $_POST["password"] != "" ){

            if (strlen($_POST["password"]) < '8') {
                $err .= "Your Password Must Contain At Least 8 Digits !"."<br>";
                echo "$err";
            }
            elseif(!preg_match("#[0-9]+#",$_POST["password"])) {
                $err .= "Your Password Must Contain At Least 1 Number !"."<br>";
                echo "$err";
            }
            elseif(!preg_match("#[A-Z]+#",$_POST["password"])) {
                $err .= "Your Password Must Contain At Least 1 Capital Letter !"."<br>";
                echo "$err";
            }
            elseif(!preg_match("#[a-z]+#",$_POST["password"])) {
                $err .= "Your Password Must Contain At Least 1 Lowercase Letter !"."<br>";
                echo "$err";
            }
            elseif(!preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $_POST["password"])) {
                $err .= "Your Password Must Contain At Least 1 Special Character !"."<br>";
                echo "$err";
            }
        }
        
    }    
        
}
			
		else 
		{
			echo "Tried to access via get method";
		}

?>

<br><br>

<a href = "/dashboard/20-42378-1/mid/php-validation/registration.html">Back</a>;

</body>
</html>