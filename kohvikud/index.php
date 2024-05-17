<?php include ('config.php'); ?>

<!doctype html>
<html lang="en">
    <head>
        <title>Kohvikud</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
    </head>

    <body>
    <?php
        //otsing
        if (!empty($_GET["s"])) {
            $s = $_GET["s"];
            $paring = 'SELECT * FROM toidukohad WHERE nimi LIKE "%'.$s.'%" ';
        } else {
            /********************************* */
            if (isset($_GET['next'])) {
                $algus = $_GET['next'];
            } 
            else if (isset($_GET['prev'])) {
                $algus = $_GET['prev']-10;
            } else {
                $algus = -10;
            }
                $algus += 10;
                $lopp = $algus - 10;
    

                

            //päring mille saadan andmebaasi
            $paring = "SELECT * FROM toidukohad LIMIT $algus,10";
        }
        //saadan soovitud ühendusele minu päringu
            $valjund = mysqli_query($yhendus, $paring);

    ?>
    ?>

    <div class="container">
            <h1>Valige asutus mida hinnata</h1>
    <table class="table table-sm">

    <tr>
        
         <th>Nimi</th>
        <th>Asukoht</th>
        <th>Keskmine hinne</th>
        <th>Hinnatud</th>
    </tr>
    <?php

while($rida = mysqli_fetch_assoc($valjund)){
    //print_r($rida);


     ?>
    <tr>
       <td><?php echo $rida ['nimi']; ?></td>
       <td><?php echo $rida ['asukoht']; ?></td>
       <td><?php echo $rida ['keskmine_hinne']; ?></td>
       <td><?php echo $rida ['hinnatud']; ?></td>
        
    </tr>
    <?php
    }
    ?>
    


    </table>
    <a href="?prev=<?php echo $lopp?>">&lt;&lt; Eelmised</a>
    <a href="?next=<?php echo $algus;?>"> Järgmised&gt;&gt;</a>
    </div>






        
        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"
        ></script>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
