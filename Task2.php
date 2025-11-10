<!-- Task 2 (30 Marks) :  Array and File Handling
 File: task2.php

1. Create an array with categories and expenses.
2. Use array functions like array_push, array_pop, array_merge, and array_sum.
3. Convert a string of expenses to array (explode) and back to string (implode).
4. Use string functions like strtoupper, strlen, substr, and str_replace.
5. Create a file named expenses.txt and write your expense data into it.
6. Append a new expense and read the file to show data on page. -->

<?php

echo "<h2>............1. Create array with categories and expenses............</h2><br>";
$expenses=[
    'food' => 20000,
    'transport' => 15000,
    'others' => 50000
];
echo "<pre>";
print_r($expenses);
echo "</pre>";

echo "<p><h2>............2. Array functions: push, pop, merge, sum............</h2></p><br>";

$numbers=[12,43,45,23,66];
echo "<pre>";
print_r($numbers);
echo "</pre>";

echo "<br><h4>Array Push:</h4> <pre>";
array_push($numbers, 75);       //array_push does not work with associative array
print_r($numbers);
echo "</pre>";

echo "<br><h4>Array Pop:</h4> <pre>";
array_pop($numbers);            //array_pop removes an element from last      
print_r($numbers);
echo "</pre>";

echo "<br><h4>Array Merge:</h4> <pre>";
$numbers1=[44,67];
$result= array_merge($numbers, $numbers1);       //array_merge merges 2 arrays together
print_r($result);
echo "</pre>";

echo "<br><h4>Array Sum:</h4>";
$result= array_sum($numbers);       //array_sum add all elements of the array
print_r($result);


echo "<p><h2>............3. Explode and Implode............</h2></p>";
echo "<br><h4>String to Array using Explode:</h4> <pre>";
$strNames="Sultan Sheikh, Ahmed Badawood, Anowar Hossain, Pervez Ali, Moniruzzaman Chowdhury";
$arrNames= explode(',', $strNames);       //Explode splits the string into array with specific delimeter
print_r($arrNames);


echo "<br><h4>Array to String using Implode:</h4>";
$strNames=implode(',', $arrNames);       //Implode joins the array elements with a delimeter in it
echo $strNames;



echo "<br><p><h2>............4. String functions strtoupper, strlen, substr, and str_replace............</h2></p>";
$str='life is beautiful';
echo 'Uppercase of the string : ' . strtoupper($str);
echo '<br>Length of the string : ' . strlen($str);
echo '<br>Sub String of the string : ' . substr($str,8, 6);     //Display 6 characters from 8th Character of the string
$newStr=str_replace('beautiful','tough',$str);
echo '<br>String replace : ' . $newStr;


echo "<br><p><h2>............5. Create a file and enter expenses detail............</h2></p>";

echo "<br><h4>Writing in a File:</h4>";
$file= fopen('expenses.txt','w');
fwrite($file, "\nExpense Detail\n...............\nFood : 20000, \nTransport: 15000");
fwrite($file, "\nHouse Rent: 25000");
echo "<pre>";
echo file_get_contents('expenses.txt');
echo "</pre>";
fclose($file);

echo "<br><p><h2>............6. Append in file and show the data............</h2></p>";

echo "<br><h4>Appending in a File:</h4>";
$file=fopen('expenses.txt','a');
fwrite($file, "\nOthers :50000");
fwrite($file, "\n---------------------");
fwrite($file, "\nTotal Expenses: 110000");
echo "<pre>";
echo file_get_contents('expenses.txt');
echo "</pre>";
fclose($file);

?>


