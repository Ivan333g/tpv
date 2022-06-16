
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mesas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="./styles/elegirmesas.css">
</head>
<body style="background-image:url('http://getwallpapers.com/wallpaper/full/a/5/d/544750.jpg')">
    <div class="container bg-info rounded">
        
            <div class="row mt-3 border border-dark justify-content-center">
            <?php
            foreach ($this->datos['mesas'] as $con) {
                if (strlen($con->num_mesa) > 0) { 
                    echo "<div class='m-2 p-1 mesa border border-dark rounded'>";
                    echo "<h5 style='text-align:center'>$con->num_mesa</h5>";
                    echo "<form action='index.php' method='post'>";
                    echo "<input type='hidden' name='num_mesa' value='$con->num_mesa'>";
                    if($con->tipo == "mesa"){
                        echo "<button id='$con->num_mesa' name='action' value='Mesa' class='botonMesa'><img class='imgMesa' src='./img/mesa.png'></button>";
                    }else{
                    echo "<button id='$con->num_mesa' name='action' value='Mesa' class='botonMesa'><img class='imgMesa' src='./img/tabure.jpg'></button>";
                    }
                    echo "</div>";
                }
                echo "</form>";
            }?>
            </div>
    </div>
    <?php
        if(isset($this->datos['orden'])){
            foreach ($this->datos['orden'] as $con) {
            echo "<script type='text/javascript'>";
            echo "document.getElementById('".$con."').className='botonMesa2'";
            // echo "console.log('".$con."')";
            echo "</script>";  
            }     
        }
    ?>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>