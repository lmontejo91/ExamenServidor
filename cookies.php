<?php
    // Start the session
    require_once "./sesiones.php";

    //Include header
    include "./cabecera.php";
?>

                <!-- DIV TARJETA CENTRAL -->
                <div class="mx-auto col col-md-7 col-lg-5 col-xl-4 px-6 pb-2">
                    <div class="card" style="border-radius: 15px;">
                        <div class="card-body p-4">
                            <div class="d-flex justify-content-around text-black">
                                
                                <!-- COLUMNA DATOS COOKIES -->
                                <div class="flex-grow-1 ms-3">
                                    <h5 class="mb-1 text-center">Cookies</h5>
                                    <div class="d-flex justify-content-start rounded-3 p-2 mb-2" style="background-color: #efefef;">
                                        <div>
                                            <ul>
                                                <li><?php echo $_COOKIE["ultima_conexion"] ?></li>
                                                <li><?php echo $_COOKIE["navegador"] ?></li>
                                            </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <!-- DIV Footer -->
        <div
            class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 bg-dark">
            <!-- Copyright -->
            <div class="text-light mb-3 mb-md-0">
            Copyright © 2020. All rights reserved.
            </div>
        </div>
    </section>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</html>