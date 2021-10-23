<!DOCTYPE html>  
<html lang="en">  
<head>  
    <title>registration form</title>
<style>  
.error {color: #FF0001;} 
body{
    background-color: black;
}
h1{
    background-color: black;
    font-size: 50px;
    color: palevioletred;
    text-align: center;
}
h2{
    background-color: burlywood;
    color: black;
font-size: 35px;
text-align: start;
} 
h3{
    color: red;
    font-size: 23px;
    text-align: center;
}
.container {
   
   padding: 6px;
   background-color: burlywood;
 }
 .registration-form{
     max-width: 400px;
     margin: auto;
 }





a {
  color: dodgerblue;
}

.signin {
  background-color: #f1f1f1;
  text-align: center;
}
.abtn{
background-color: aquamarine;
color: white;
}
form{
    color: black;
    font-size: 20px;
}

</style>  
</head>  
<body>    
  
<?php  
 
$nameErr = $emailErr = $mobilenoErr = $contributionErr= $amountErr= $agreeErr = "";  
$name = $email = $mobileno = $contribution = $amount = $agree = "";  
  

if ($_SERVER["REQUEST_METHOD"] == "POST") {  
      
 
    if (empty($_POST["name"])) {  
         $nameErr = "Name is required";  
    } else {  
        $name = input_data($_POST["name"]);  
             
            if (!preg_match("/^[a-zA-Z ]*$/",$name)) {  
                $nameErr = "Only alphabets and white space are allowed";  
            }  
    }  
      
      
    if (empty($_POST["email"])) {  
            $emailErr = "Email is required";  
    } else {  
            $email = input_data($_POST["email"]);  
            
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {  
                $emailErr = "Invalid email format";  
            }  
     }  
    
    
    if (empty($_POST["mobileno"])) {  
            $mobilenoErr = "Mobile no is required";  
    } else {  
            $mobileno = input_data($_POST["mobileno"]);  
             
            if (!preg_match ("/^[0-9]*$/", $mobileno) ) {  
            $mobilenoErr = "Only numeric value is allowed.";  
            }  
        
        if (strlen ($mobileno) != 10) {  
            $mobilenoErr = "Mobile no must contain 10 digits.";  
            }  
    }  
      
    
      
     
    if (empty ($_POST["contribution"])) {  
            $contributionErr = "contribution is required";  
    } else {  
            $contribution = input_data($_POST["contribution"]);  
    } 


    if (empty($_POST["amount"])) {  
        $amountErr = "fill amount";  
    } else {  
        $amount = input_data($_POST["amount"]);  
         
        if (!preg_match ("/^[0-9]*$/", $amount) ) {  
        $amountErr = "Only numeric value is allowed.";  
        }  
    
    if (strlen ($amount) != 10) {  
        $amountErr = "amount must contain 10 digits .";  
        }  
}  
    
    if (!isset($_POST['agree'])){  
            $agreeErr = "Accept terms of services before submit.";  
    } else {  
            $agree = input_data($_POST["agree"]);  
    }  
}  
function input_data($data) {  
  $data = trim($data);  
  $data = stripslashes($data);  
  $data = htmlspecialchars($data);  
  return $data;  
}  
?>  
   <div class="container">
  <div class="registration-form">
      
     <h1>LEAF NOW</h1>
     
  
<h2>Registration Form</h2>  
<span class = "error"> #required field </span>  
<br><br>  
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" >    
    Name:   
    <input type="text" name="name">  
    <span class="error">* <?php echo $nameErr; ?> </span>  
    <br><br>  
    E-mail:   
    <input type="text" name="email">  
    <span class="error">* <?php echo $emailErr; ?> </span>  
    <br><br>  
    Mobile No:   
    <input type="text" name="mobileno">  
    <span class="error">* <?php echo $mobilenoErr; ?> </span>  
    <br><br>  
     contribution:  
    <input type="radio" name="contribution" value="sell"> SELL 
    <input type="radio" name="contribution" value="buy"> BUY
    <input type="radio" name="contribution" value="donate"> DONATE 
    <span class="error">* <?php echo $contributionErr; ?> </span>  
    <br><br> 
    Amount:   
    <input type="text" name="amount">  
    <span class="error">* <?php echo $amountErr; ?> </span>  
    <br><br>
    Agree to Terms of Service:  
    <input type="checkbox" name="agree">  
    <span class="error">* <?php echo $agreeErr; ?> </span>  
    <br><br>                            
    <input type="submit" name="submit" value="Submit"> 
    <br><br>     
    <p>Already have an account? <a href="http://localhost//leaf-now/login.html">login</a>.</p>
  
</form>
  </div>
   </div>
<?php  
    if(isset($_POST['submit'])) {  
    if($nameErr == "" && $emailErr == "" && $mobilenoErr == "" && $contributionErr == ""  && $amountErr == "" && $agreeErr == "") {  
        echo "<h3><b>You have sucessfully registered.</b> </h3>";  
        echo "<h2>Your Input:</h2>";  
        echo "Name: " .$name;  
        echo "<br>";  
        echo "Email: " .$email;  
        echo "<br>";  
        echo "Mobile No: " .$mobileno;  
        echo "<br>";  
        echo "contribution: " .$contribution;  
        echo "<br>"; 
        echo "amount: " .$amount;  
        echo "<br>";
        echo "agree: " .$agree;  
        echo "<br>";
       
    } else {  
        echo "<h3> <b>You didn't filled up the form correctly.</b> </h3>";  
    }  
    }  
?>  
  
   


</body>  
</html>  