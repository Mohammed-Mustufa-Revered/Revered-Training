<html>
<body>
    <?php
class Ass
{
 

    function star()
    {
        $n = 8;
        for ($i = 0; $i < $n; $i++) {
            for ($j = 0; $j < $i; $j++) {
                echo "*";
            }
            echo "<br>";
        }
    }

    

    function count_pattern()
    {
        $n = 8;

        for ($i = $n; $i > 0; $i--) {
            for ($j = 1; $j <= $i; $j++) {
                echo $j . " ";
            }
            echo "<br>";
        }
        echo "<br>";
    }

    function small_no()
    {
        $arr = [4, 6, 8, 2, 5];
        $len = count($arr);
        $smallest = $arr[0];

        for ($i = 1; $i < $len; $i++) {
            if ($arr[$i] < $smallest) {
                $smallest = $arr[$i];
            }
        }

        echo "smalest number: " . $smallest;
        echo "<br>";
    }
    function Large_no()
    {
        $arr = [1, 4, 6, 8, 2, 5];
        $len = count($arr);
        $largest = $arr[0];

        for ($i = 1; $i < $len; $i++) {
            if ($arr[$i] > $largest) {
                $largest = $arr[$i];
            }
        }

        echo "largest number: " . $largest;
        echo "<br>";
    }
    function SecondLargest()
    {
        $arr = [5, 3, 1, 4, 7, 2];
        $len = count($arr);

        if ($len < 2) {
            echo "Array needs at least two elements.";
            return;
        }

        $largest = $secondLargest = PHP_INT_MIN;

        for ($i = 0; $i < $len; $i++) {
            if ($arr[$i] > $largest) {
                $secondLargest = $largest;
                $largest = $arr[$i];
            } elseif ($arr[$i] > $secondLargest && $arr[$i] != $largest) {
                $secondLargest = $arr[$i];
            }
        }

        if ($secondLargest == PHP_INT_MIN) {
            echo "no second largst element foud .";
        } else {
            echo "Second largest number is: " . $secondLargest;
        }
        echo "<br>";
    }
   
}
$ass1 = new Ass();

echo $ass1-> star();
echo $ass1->count_pattern();
echo $ass1 ->small_no(); 
echo $ass1->Large_no();
echo $ass1->SecondLargest();




    ?>
</html>
</body>