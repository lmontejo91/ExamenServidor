<?php
    // Start the session
    require_once "./sesiones.php";

    //Include header
    include "./cabecera.php";
?>


<?php

$_SESSION['gameOver']= false;

function obtenerNum(){      
    $numero = rand($_SESSION['min'], $_SESSION['max']);
    $_SESSION['contadorPreguntas']++;
    $_SESSION['num_Random'] = $numero;
    return $numero;    
}

function modificarMaxMin(){
    if($_POST['resp'] == "mayor"){
        $_SESSION['min'] = $_SESSION['num_Random'];
    }

    if($_POST['resp'] == "menor"){
        $_SESSION['max'] = $_SESSION['num_Random'];
    }

    if($_POST['resp'] == "acertado"){
        header('Location: ./principal.php');
    }
}

if(isset($_POST["jugar"])){
/*     global $minimo;
    global $maximo; */
    $_SESSION['max'] = 100;
    if($_POST['edad'] == "1"){
        $_SESSION['min'] = 18;    
    }else{
        $_SESSION['min'] = 0;
    }

    $_SESSION['n_preguntas'] = $_POST['npreguntas'];
    $_SESSION['contadorPreguntas'] = 0;
}

if(isset($_POST["enviar"]) && $_SESSION['contadorPreguntas'] < $_SESSION['n_preguntas']){
    modificarMaxMin();
}

if($_SESSION['contadorPreguntas'] >= $_SESSION['n_preguntas']){
    $_SESSION['gameOver']= true;
}



?>



<?php if(!($_SERVER["REQUEST_METHOD"] == "POST")): ?>
<div id="containerAll" style="visibility:visible;">
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" >
   <div id="fondo" class="mt-5"><h1 class="text-center" >Adivino tu edad</h1></div>
   <div class="container" style="width: 550px; height: 300px;">
        <div class="mt-5, shadow-lg p-4 mb-4 bg-white"> 
     
            <div class="row mb-3">
                <label id="colorL" for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Eres mayor de edad?</label>
                <div class="col-sm">
                <input type="radio" name="edad" value="1"> Sí
                <br>
                <input type="radio" name="edad" value="0"> No

                </div>
            </div>
        
                
            <div class="row mb-3">
                <label id="colorL" for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Numero de preguntas a realizar:</label>
                <div class="col-sm">
                <input type="number" min=1 max=10 class="form-control form-control-sm" id="colFormLabelSm" name="npreguntas" required>
                </div>
            </div>
     
            <div class="mx-auto" style="width: 250px;"> 
                <button type="submit"  class="btn btn-dark" name="jugar" onclick="Jugar()">Jugar</button>
            </div>

        </div> 
     
    </div>
</form>
</div>
<?php endif; ?>




<?php if(($_SERVER["REQUEST_METHOD"] == "POST") && $_SESSION['gameOver'] == false): ?>
        <div id="preguntas">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" >
                <div class="container" style="width: 550px; height: 300px;">
                    <div class="shadow-lg p-4 mb-4 bg-white">
                        <?php echo $_SESSION['min'] ?>
                        <?php echo $_SESSION['max'] ?>
                        <h4>¿Tienes  <?php echo obtenerNum()?> ? </h4>
                        
                        <label><input type=radio name="resp" value="mayor">Mayor</label><br>
                        <label><input type=radio name="resp" value="menor">Menor</label><br>
                        <label><input type=radio name="resp"  value="acertado">Has acertado</label><br> 

                        
                        <div class="mx-auto" style="width: 250px;"> 
                            <button type="submit"  class="btn btn-dark" name="enviar">Enviar</button>
                        </div>
                    </div>
                </div>
        </form>
        </div> 
<?php endif; ?>






</body>

</html>

