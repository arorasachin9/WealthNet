<?php
session_start();
if (array_key_exists("id", $_COOKIE) and $_COOKIE['id']) {

    $_SESSION['id'] = $_COOKIE['id'];
}

function common_unserialize($serial_str)
{
    $serial_str = preg_replace_callback('/s:(\d+):"([\s\S]*?)";/', function ($matches) {
        return 's:' . strlen($matches[2]) . ':"' . $matches[2] . '";';
    }, $serial_str);
    return unserialize($serial_str);
}


if (array_key_exists('id', $_SESSION) and $_SESSION['id']) {

    include("connection.php");
    $query = "SELECT * FROM `diary` WHERE id = '" . mysqli_real_escape_string($link, $_SESSION['id']) . "' LIMIT 1";
    $result = mysqli_query($link, $query);
    if (!$result) {
        printf("Error: %s\n", mysqli_error($link));
        exit();
    }

    //if(isset($result))
    //{
    $row = mysqli_fetch_array($result);
    //}
    /*$sr = array("Sr.No.","1","2","3");
    $sector = array("Sector","FMCG","Telecom","Bank");
    $company = array("Company","ITC","Bharti Airtel","Bandha Bank");
    $total = array("Total Investment","4998.5","5186.5","2990.1");
    $current = array("Current Value","5186.25","5407","3192");
    $serial = serialize($sr);
    $query = "UPDATE `diary` SET `sr.` = '$serial' WHERE id = '" . mysqli_real_escape_string($link, $_SESSION['id']) . "' LIMIT 1";
    $result = mysqli_query($link,$query);
    $sectorName = serialize($sector);
    $query = "UPDATE `diary` SET `sector` = '$sectorName' WHERE id = '" . mysqli_real_escape_string($link, $_SESSION['id']) . "' LIMIT 1";
    $result = mysqli_query($link,$query);
    $companyName = serialize($company);
    $query = "UPDATE `diary` SET `company` = '$companyName' WHERE id = '" . mysqli_real_escape_string($link, $_SESSION['id']) . "' LIMIT 1";
    $result = mysqli_query($link,$query);
    $currentValue = serialize($current);
    $query = "UPDATE `diary` SET `current` = '$currentValue' WHERE id = '" . mysqli_real_escape_string($link, $_SESSION['id']) . "' LIMIT 1";
    $result = mysqli_query($link,$query);
    $totalInvestment = serialize($total);
    $query = "UPDATE `diary` SET `total` = '$totalInvestment' WHERE id = '" . mysqli_real_escape_string($link, $_SESSION['id']) . "' LIMIT 1";
    $result = mysqli_query($link,$query);
*/
    $query = "SELECT * FROM `diary` WHERE id = '" . mysqli_real_escape_string($link, $_SESSION['id']) . "' LIMIT 1";
    $result = mysqli_query($link, $query);
    //var_dump($result);
    $row = mysqli_fetch_array($result);
    //var_dump($row);
    //echo $row['sr.'];
    $a = unserialize($row['sr.']);
    //print_r($a);
    $b = unserialize($row['sector']);
    $c = unserialize($row['company']);
    $d = unserialize($row['total']);
    $e = unserialize($row['current']);
    //var_dump($a);
    // print_r($e);
    //echo isset($_POST['submit']);
    //print_r( $_POST);
    if (isset($_POST['sign']) and $_POST['sign'] == "1") {
        //echo "1<br>";
        //echo $_POST['current'];
        if (isset($_POST['current']) and $_POST['current'] != "" and $_POST['total'] != "" and $_POST['company'] != "" and $_POST['sector'] != "") {

            //echo "<br>2";
            array_push($e, $_POST['current']);
            array_push($d, $_POST['total']);
            array_push($c, $_POST['company']);
            array_push($b, $_POST['sector']);
            array_push($a, sizeof($a));
            $serial = serialize($a);
            $query = "UPDATE `diary` SET `sr.` = '$serial' WHERE id = '" . mysqli_real_escape_string($link, $_SESSION['id']) . "' LIMIT 1";
            $result = mysqli_query($link, $query);
            $sectorName = serialize($b);
            $query = "UPDATE `diary` SET `sector` = '$sectorName' WHERE id = '" . mysqli_real_escape_string($link, $_SESSION['id']) . "' LIMIT 1";
            $result = mysqli_query($link, $query);
            $companyName = serialize($c);
            $query = "UPDATE `diary` SET `company` = '$companyName' WHERE id = '" . mysqli_real_escape_string($link, $_SESSION['id']) . "' LIMIT 1";
            $result = mysqli_query($link, $query);
            $currentValue = serialize($e);
            $query = "UPDATE `diary` SET `current` = '$currentValue' WHERE id = '" . mysqli_real_escape_string($link, $_SESSION['id']) . "' LIMIT 1";
            $result = mysqli_query($link, $query);
            $totalInvestment = serialize($d);
            $query = "UPDATE `diary` SET `total` = '$totalInvestment' WHERE id = '" . mysqli_real_escape_string($link, $_SESSION['id']) . "' LIMIT 1";
            $result = mysqli_query($link, $query);
            $a = unserialize($row['sr.']);
            $b = unserialize($row['sector']);
            $c = unserialize($row['company']);
            $d = unserialize($row['total']);
            $e = unserialize($row['current']);
            //print_r($b);
            header("location: Portfolio.php");
            unset($_POST['sign']);
            //print_r($_POST);

        }
    }
    //print_r($b);



    /*$f = array("Sr.no.","1");
    $g = array("Fund Name","ABCDEF");
    $h = array("Fund Type","XYZ");
    $i = array("Total Investment","123345");
    $j = array("Current Value","23456");
    $serial = serialize($f);
    $query = "UPDATE `diary` SET `srMutual` = '$serial' WHERE id = '" . mysqli_real_escape_string($link, $_SESSION['id']) . "' LIMIT 1";
    $result = mysqli_query($link,$query);
    $sectorName = serialize($g);
    $query = "UPDATE `diary` SET `fundMutual` = '$sectorName' WHERE id = '" . mysqli_real_escape_string($link, $_SESSION['id']) . "' LIMIT 1";
    $result = mysqli_query($link,$query);
    $companyName = serialize($h);
    $query = "UPDATE `diary` SET `typeMutual` = '$companyName' WHERE id = '" . mysqli_real_escape_string($link, $_SESSION['id']) . "' LIMIT 1";
    $result = mysqli_query($link,$query);
    $currentValue = serialize($i);
    $query = "UPDATE `diary` SET `totalMutual` = '$currentValue' WHERE id = '" . mysqli_real_escape_string($link, $_SESSION['id']) . "' LIMIT 1";
    $result = mysqli_query($link,$query);
    $totalInvestment = serialize($j);
    $query = "UPDATE `diary` SET `currentMutual` = '$totalInvestment' WHERE id = '" . mysqli_real_escape_string($link, $_SESSION['id']) . "' LIMIT 1";
    $result = mysqli_query($link,$query);
    

    $f = unserialize($row['srMutual']);
    $g = unserialize($row['fundMutual']);
    $h = unserialize($row['typeMutual']);
    $i = unserialize($row['totalMutual']);
    $j = unserialize($row['currentMutual']);
    $query = "SELECT * FROM `diary` WHERE id = '" . mysqli_real_escape_string($link, $_SESSION['id']) . "' LIMIT 1";
    $result = mysqli_query($link, $query);
    //var_dump($result);
    $row = mysqli_fetch_array($result);*/
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        #submitButton {
            display: none;
        }

        #inputTable {
            display: none;
        }

        #submitButton2 {
            display: none;
        }

        #inputTable2 {
            display: none;
        }
    </style>
</head>

<body>
    <h1 style="position:relative; left:750px">Equity(Stock)</h1>
    <table class="table">

        <?php
        for ($i = 0; $i < sizeof($a); $i++) {
            if ($i == 0) {
                echo "<thead> 
            <tr>
             <th scope='col'>$a[$i]</th>
            <th scope='col'>$b[$i]</th>
            <th scope='col'>$c[$i]</th>
            <th scope='col'>$d[$i]</th>
            <th scope='col'>$e[$i]</th>
            </tr>
            </thead>
            <tbody>";
            } else {
                echo "<tr>
            <th scope='row'>$a[$i]</th>
            <td>$b[$i]</td>
            <td>$c[$i]</td>
            <td>$d[$i]</td>
            <td>$e[$i]</td>
            </tr>";
            }
        }
        echo "</tbody>";
        ?>
    </table>
    <button id="insertNewValue" style="float: right;margin-right: 150px;">Insert New Value</button>

    <form action="" method="post">
        <table class="table" id="inputTable">

            <tbody>
                <tr>
                    <th scope="row"><?php echo sizeof($a); ?></th>
                    <td><input type="text" placeholder="Sector" name="sector" style="position: relative; left: 180px;"></td>
                    <td><input type="text" placeholder="Company Name" name="company"></td>
                    <td><input type="int" placeholder="Total Investment" name="total" style="position: relative; right: 60px;"></td>
                    <td><input type="int" placeholder="Current Value" name="current" style="position: relative; left: 10px;"></td>

                </tr>


            </tbody>
        </table>
        <input type="hidden" name="sign" value="1">
        <button type="submit" name="submit" class="btn btn-success" id="submitButton" style="float: right; margin-right: 150px;">Submit</button>
    </form>

    <!--
    <h1 style="position:relative; left:690px; top: 50px;">Equity(Mutual Fund)</h1>

    <table class="table" style="position: relative;top: 50px;">
    
    <?php
    /*for($i =0 ;$i<sizeof($f);$i++)
    {
        if($i==0)
        {
            echo "<thead> 
            <tr>
             <th scope='col'>$f[$i]</th>
            <th scope='col'>$g[$i]</th>
            <th scope='col'>$h[$i]</th>
            <th scope='col'>$i[$i]</th>
            <th scope='col'>$j[$i]</th>
            </tr>
            </thead>
            <tbody>";
        }
        else
        {
            echo "<tr>
            <th scope='row'>$f[$i]</th>
            <td>$g[$i]</td>
            <td>$h[$i]</td>
            <td>$i[$i]</td>
            <td>$j[$i]</td>
            </tr>";
        }
    }
    echo "</tbody>";*/
    ?> 
    </table>
    <button id="insertNewValueMutual" style="float: right;margin-right: 150px;">Insert New Value</button>


    <form action="" method="post">
        <table class="table" id="inputTable2">

            <tbody>
                <tr>
                    <th scope="row"><?php echo sizeof($a); ?></th>
                    <td><input type="text" placeholder="Fund Name" name="fundMutual" style="position: relative; left: 180px;"></td>
                    <td><input type="text" placeholder="Fund Type" name="typeMutual"></td>
                    <td><input type="int" placeholder="Total Investment" name="totalMutual" style="position: relative; right: 60px;"></td>
                    <td><input type="int" placeholder="Current Value" name="currentMutual" style="position: relative; left: 10px;"></td>

                </tr>


            </tbody>
        </table>
        <input type="hidden" name="sign2" value="1">
        <button type="submit" name="submitMutual" class="btn btn-success" id="submitButton2" style="float: right; margin-right: 150px;">Submit</button>
    </form>-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script type="text/javascript">
        $("#insertNewValue").click(function() {
            $("#submitButton").toggle();
            $("#inputTable").toggle();

        });
        $("#insertNewValueMutual").click(function() {
            $("#submitButton2").toggle();
            $("#inputTable2").toggle();

        });
    </script>
</body>

</html>