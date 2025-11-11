<!-- Task 3 (40 Marks) : Session and Exception Handling
 File: task3.php

1. Start a session and take user name and budget from a simple form
2. Store the data in session and show “Welcome, (name)! Your budget is (amount).”
3. Add a button to delete the session.
4. Create a recursive function to calculate sum from an array.
5. Create a function that applies a discount using a callback.
6. Write a function that divides two numbers and handle errors with try-catch-finally. -->

<?php

session_start();

if(isset($_POST['btnSubmit']))
{
    $name=$_POST['txtName'];
    $food=$_POST['txtFood'];
    $transport=$_POST['txtTransport'];
    $others=$_POST['txtOthers'];

    $_SESSION['user_name']=$name;
    $_SESSION['food_budget']=$food;
    $_SESSION['transport_budget']=$transport;
    $_SESSION['other_budget']=$others;
}

if(isset($_POST['btnDelete']))
{
    session_unset();
    session_destroy();
    echo "The session is deleted ! ";
}

function funcSum($arrNum, $j)
{ 
    if($j == 0)
    {
        return 0;                   
    }
    else
    {
        return $arrNum[$j-1] + funcSum($arrNum, $j-1); 
    }
}

function funcDiscount($amount)
{
    return $amount*funcPercentage($amount);
}

function funcPercentage($amount)
{
    if($amount<2000)
        return 5/100;
    elseif($amount<5000)
        return 10/100;
    elseif($amount<10000)
        return 20/100;
    elseif($amount>=10000)
        return 25/100;
    else
        return 0;

}

function funcDivision()
{
    try
    {
        throw new Exception("Error Processing Request", 1);
        
    }
    catch(Exception $error)
    {
        echo "Display error";
        
    }
    finally
    {
        echo "This is the final block before closing the application";
    }
}


?>

<html>
    <head>
        <style>   
          input[type="text"]
          {
            width: 100px;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 12px;
            box-sizing: border-box;
          }
          button 
          {
            width: 200px;
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: 0.3s;
          }
          button:hover
          {
            background-color: #0056b3;
          }

        </style>
    </head>
    <body>
<form method="post">
    <?php
         if(isset($_SESSION['user_name']))
         {
            echo "Welcome, {$_SESSION['user_name']} ! <br>Your food budget is : {$food} ";
            echo "<br>Your transportation budget is : {$transport}";
            echo "<br>Your other budget is : {$others}";
         }
    ?>
    <p><p></p></p>
    <hr>
<h4>Fill up the form and submit ! </h4><br>
Name : <input type="text" name="txtName"><br>
Food : <input type="text" name="txtFood"><br>
Transport : <input type="text" name="txtTransport"><br>
Others : <input type="text" name="txtOthers"><br>
<button type="submit" name="btnSubmit">Submit</button>
<button type="Delete Session" name="btnDelete">Delete Session</button>
</form>

    <p><p></p></p>
    
    <p>Recursive Function to calculate the sum of an array</p><hr>
         <?php
         
            $num=[12,32,45,65];
            echo "Sum of the array is : " . funcSum($num, count($num));

            echo "<p> Discount Function with Call Back </p>";
            $actualPrice=5000;
            echo "Actual Price : " . $actualPrice . "<br>";
            echo "Discounted price : " . $actualPrice-funcDiscount($actualPrice);

            echo "<br>";
            funcDivision();

         ?>
    </body>
</html>



