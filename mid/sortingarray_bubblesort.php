<?php 

$myArray = array(5, 10, 2, 4, 1);

function sortArray(&$myArray)
{
    $n = sizeof($myArray);
  
    for($i = 0; $i < $n; $i++) 
    {
        
        for ($j = 0; $j < $n - $i - 1; $j++) 
        {
           
            if ($myArray[$j] > $myArray[$j+1])
            {
                $temp_1 = $myArray[$j];
                $myArray[$j] = $myArray[$j+1];
                $myArray[$j+1] = $temp_1 ;
            }
        }
    }
}
  
  
$length = sizeof($myArray);
sortArray($myArray);
  
echo "Sorted array : \n";
  
for ($i = 0; $i < $length; $i++)
    echo $myArray[$i]." "; 
  
?>