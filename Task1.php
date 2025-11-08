<!-- Task 1 (30 Marks): Expense Calculator
 File: task1.php

1. Create constants for app name and author.
2. Print them using echo, print, and printf.
3. Create variables for food, transport, and other expenses.
4. Calculate total and average expense.
5. If total > 1000, show “Budget Exceeded”, else “Within Budget”.
6. Use ternary and switch case for expense range message.
7. Write a function to calculate total expense.
8. Write another function to check the budget and show the result. -->


<?php
echo "<p>---------1-2. Constant Declaration & Display ------------</p>";
define ('name', "Expense Calculator");
echo "Displaying the app name with echo : " . name . "<br>";
print "Displaying the app name with print :" . name . "<br>";
printf("Displaying the app name with printf : %s <br>",name);

echo "<br><p>---------3-4. Variable Declaration & Expense Calculation ------------</p>";
$food=20000;
$transport=15000;
$otherExp=50000;
$total=$food+$transport+$otherExp;
$average=round($total/3, 2);
echo "Food Expense is : " . $food;
echo "<br>Transportation Expense is : " . $transport;
echo "<br>Other Expenses : " . $otherExp;
echo "<br>---------------------------------<br>Total Expense is : " . $total;

echo "<br><br>Average Expense of 3 Items : " . $average;

echo "<br><p>---------5. If-else to determine expense level ------------</p>";
if($total > 1000)
{
    echo "Budget Exceeded <br>";
}
else
{
    echo "Within Budget <br>";
}


echo "<br><p>---------6. Ternary & Switch-Case to determine expense level ------------</p>";
echo ($total>1000) ? "Budget Exceeded" : "Within Budget";
switch($total)
{
    case $total<=1000:
        echo "<br>Within Budget";
        break;

    case $total>1000:
        echo "<br>Budget Exceeded";
        break;   
}



function funcCalculateExpenses($fd, $tr, $others)
{
    echo "<br><p>---------7. Use Function to calculate expenses ------------</p>";
    $sum = $fd+$tr+$others;
    echo "Total Expense : {$sum} <br>";
    funcExpenses($sum);    
}



function funcExpenses($totalExpense)
{
    echo "<br><p>---------8. Use Function to check budget and display result ------------</p>";
    echo ($totalExpense>1000) ? "<br>Budget Exceeded" : "<br>Within Budget";
}

funcCalculateExpenses($food, $transport, $otherExp);

?>
