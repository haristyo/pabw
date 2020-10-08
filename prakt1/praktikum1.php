<html>
<head>
    <title>PABW</title>
</head>
<body>
<form action="praktikum1.php" method="GET">
    <input type="number" name="bil1"
    <?php
     if(isset($_GET['bil1'])){
         echo 'value ="'.$_GET['bil1'].'"';
     }
    ?>
    />
    <select name="opr" id="">
        <option value="+">+</option>
        <option value="-">-</option>
        <option value="/">/</option>
        <option value="x">x</option>
    </select>
    <input type="number" name="bil2"
    <?php
     if(isset($_GET['bil2'])){
         echo 'value ="'.$_GET['bil2'].'"';
     }
    ?>
    />
    <input type="submit" value="=" name="sub">

    <?php
    if(ISSET($_GET['sub']) && ($_GET['bil1']!=null) && ($_GET['bil2']!=null )) {
        switch ($_GET['opr']) {
            case '+':
                $hasil = $_GET['bil1']+$_GET['bil2'];
                break;
            case '-':
                $hasil = $_GET['bil1']-$_GET['bil2'];
                break;
            case 'x':
                $hasil = $_GET['bil1']*$_GET['bil2'];
                break;            
            case '/':
                $hasil = $_GET['bil1']/$_GET['bil2'];
                break;
            default:
                # code...
                break;
        }
        echo $hasil;
        $log = $_GET['history']." ".$_GET['bil1']." ".$_GET['opr']." ".$_GET['bil2']." = ".$hasil."<br>";
    }
    ?>
    <input type="hidden" name="history"
    <?php
    if(ISSET($_GET['sub']) && ($_GET['bil1']!=null) && ($_GET['bil2']!=null )) {
        echo 'value="'.$log.'"';
    }
    else {
        echo 'value=""';
    }
    ?>
    
    />
    <H2> Log Perhitungan Sebelumnya : </h2> 
    <?php
    if(ISSET($_GET['sub']) && ($_GET['bil1']!=null) && ($_GET['bil2']!=null ))
        echo $log;
    ?>
    </form>
</body>
</html>