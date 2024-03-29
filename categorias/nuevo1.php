<?php 
    include("../conexion/bd.php");

    $consulta = $conexion->prepare("SELECT * FROM categoria");
    $consulta->execute();
    $registro_categoria = $consulta->fetchAll(PDO::FETCH_ASSOC);

?>



<!DOCTYPE html>
<html lang="es" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorias</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css">
    <!-- <script src="https://kit.fontawesome.com/ae360af17e.js" crossorigin="anonymous"></script> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.2.0/remixicon.css">
    <!-- <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css"> -->
    <link rel="stylesheet" href="../css/style.css">

    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.2/css/dataTables.dataTables.css" />
    <!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->
    <!-- SweetAlert2 CSS -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css"> -->

</head>



<?php
    // function showAlert($icon, $title, $message) {
    //     echo 
    //     '<script>
    //     document.addEventListener("DOMContentLoaded", function() {
    //         Swal.fire({
    //             icon: "' . $icon . '",
    //             title: "' . $title . '",
    //             text: "' . $message . '"
    //         });
    //     });
    //     </script>';
    // }
?>

<?php

    // if($_POST){
    //     $nombrecategoria = isset($_POST["nombrecategoria"]) ? trim($_POST["nombrecategoria"]) : "";

    //     // Verificar si el nombre de la categoría está vacío
    //     if(empty($nombrecategoria)) {
    //         showAlert("warning", "Advertencia", "El nombre de la categoría no puede estar vacío.");
    //     } 
    //     else {
    //         // Sanitizar el nombre de la categoría para prevenir inyección SQL
    //         $nombreCategoriaSanitizado = filter_var($nombrecategoria, FILTER_SANITIZE_STRING);

    //         // Verificar si el nombre de la categoría contiene solo letras y números
    //         if(preg_match("/^[a-zA-Z0-9\s()]+$/", $nombreCategoriaSanitizado)) {
    //             // Intentar insertar la categoría en la base de datos
    //             $consulta2 = $conexion->prepare("INSERT INTO categoria (id_categoria, nombre) VALUES (NULL, :nombrecategoria)");
    //             $consulta2->bindParam(":nombrecategoria", $nombrecategoria);

    //             try {
    //                 if($consulta2->execute()){
    //                     // showAlert("success", "Éxito", "Categoría agregada exitosamente.");
    //                     // header("Location: index.php");
    //                     echo '<script>
    //                             document.addEventListener("DOMContentLoaded", function() {
    //                                 Swal.fire({
    //                                     icon: "success",
    //                                     title: "Éxito",
    //                                     text: "Categoría agregada exitosamente."
    //                                 }).then(function() {
    //                                     window.location.href = "index.php";
    //                                 });
    //                             });
    //                         </script>';
    //                 }
    //             } 
    //             catch (PDOException $e) {
    //                 // Si la inserción falla debido a una violación de la restricción única
    //                 if($e->errorInfo[1] == 1062) { // Código de error 1062 indica una violación de la restricción única
    //                     showAlert("error", "Error", "El nombre de la categoría ya existe.");
    //                 } 
    //                 else {
    //                     // Si ocurre otro tipo de error, mostrar un mensaje genérico de error
    //                     showAlert("error", "Error", "Error al insertar la categoría.");
    //                 }
    //             }
    //         } 
    //         else {
    //             showAlert("error", "Error", "El nombre de la categoría solo puede contener letras y números.");
    //         }
    //     }
    // }

    // function alerta($icono, $titulo, $texto){
    //     echo '
    //         <script>
    //             document.addEventListener("DOMContentLoaded", function(){
    //                 Swal.fire({
    //                     icon: "' . $icono .'",
    //                     title: "' . $titulo . '",
    //                     text: "' . $texto . '"
    //                 });
    //             });
    //         </script>
    //     ';
    // }

    // if($_POST){
    //     $nombrecategoria = (isset($_POST['nombrecategoria'])?trim($_POST['nombrecategoria']):"");
        
    //     if(empty($nombrecategoria)){
    //         //echo "El nombre de la categoria no puede estar vacio";
    //         alerta("warning", "Alerta", "El nombre de la categoria no debe estar vacio");
    //     }
    //     else{
    //         $nombrecategoriasanitizado = filter_var($nombrecategoria, FILTER_SANITIZE_STRING);
    //         if(preg_match('/^[a-zA-Z0-9\s()]+$/', $nombrecategoriasanitizado)){
    //             $consulta2 = $conexion->prepare("INSERT INTO categoria(id_categoria, nombre) VALUES(NULL,:nombre)");
    //             $consulta2->bindParam(":nombre", $nombrecategoriasanitizado);

    //             try {
    //                 if($consulta2->execute()){
    //                     //echo "Nombre de la categoria insertado exitosamente";
    //                     alerta("success", "Exito", "Nombre de la categoria agregado exitosamente");
    //                 }
    //             } 
    //             catch (PDOException $e) {
    //                 if($e->errorInfo[1] == 1062){
    //                     //echo "El nombre de la categoria ya existe";
    //                     alerta("warning", "Alerta", "El nombre de la categoria ya existe");
    //                 }
    //                 else{
    //                     //echo "Categoria no insertada revise la conexion o la insercion a la bd";
    //                     alerta("error", "Error", "Categoria no insertada revise la conexion o la insercion a la bd");
    //                 }
    //             }
    //         }
    //         else{
    //             //echo "El nombre de la categoria solo puede contener letras o numeros";
    //             alerta("error", "Error", "La categoria solo puede contener letras o numeros");
    //         }
    //     }
    // }

    function msjAlert($icono, $titulo, $mensaje ){
        echo '
            <script>
                document.addEventListener("DOMContentLoaded", function(){
                    Swal.fire({
                        icon: "' .$icono. '",
                        title: "' .$titulo. '",
                        text: "' .$mensaje. '"
                    });
                });
            </script>
        ';
    }

    if($_POST){
        $nombrecategoria = (isset($_POST['nombrecategoria'])?trim($_POST['nombrecategoria']):"" );

        if(empty($nombrecategoria)){
            //echo "El nombre de la categoria no puede estar vacio";
            msjAlert("warning", "Alerta", "El nombre de la categoria no puede estar vacio" );
        }
        else{
            $nombrecategoriasanitizado = filter_var($nombrecategoria, FILTER_SANITIZE_STRING);
            if(preg_match('/^[a-zA-Z0-9\s()]+$/', $nombrecategoriasanitizado)){
                $consulta2 = $conexion->prepare("INSERT INTO categoria (id_categoria, nombre) VALUES(NULL,:nombre)");
                $consulta2->bindParam(":nombre", $nombrecategoriasanitizado);
                try {
                    if($consulta2->execute()){
                        // echo "Nombre de la categoria agregado exitosamente";
                        //msjAlert("success", "Exito", "Categoria agregada exitosamente");
                        // header("Location:index.php");
                        // exit();
                        // echo '<script>
                        //         document.addEventListener("DOMContentLoaded", function() {
                        //             Swal.fire({
                        //                 icon: "success",
                        //                 title: "Éxito",
                        //                 text: "Categoría agregada exitosamente."
                        //             }).then(function() {
                        //                 window.location.href = "index.php";
                        //             });
                        //         });
                        //     </script>';
                        echo '
                            <script>
                                document.addEventListener("DOMContentLoaded", function(){
                                    Swal.fire({
                                        icon: "success",
                                        title: "Exito",
                                        text: "Categoria agregada exitosamente"
                                    }).then(function(){
                                        window.location.href="index.php";
                                    })
                                })
                            </script>
                        ';
                    }

                } catch (PDOException $e) {
                    if($e->errorInfo[1] == 1062){
                        // echo "El nombre de la categoria ya existe";
                        msjAlert("warning", "Alerta", "El nombre de la categoria ya existe");
                    }
                    else{
                        //echo "Error al insertar en la base de datos";
                        msjAlert("error", "Error", "Error al insertar en la base de datos");
                    }
                }
            }
            else{
                //echo "El nombre de la categoria solo puede contener letras o numeros";
                msjAlert("error", "Error", "El nombre de la categoria solo puede tener letras o numeros");
            }
        }
    }
?>


<body>
    <div class="wrapper">
        <aside id="sidebar" class="js-sidebar">
            <!-- Content For Sidebar -->
            <div class="h-100">
                <div class="sidebar-logo text-center">
                    <a href="#">Import Hermoza</a>
                </div>
                <ul class="sidebar-nav">
                    <li class="sidebar-header">
                        Administrador de Elementos
                    </li>
                    
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link">
                            <i class="ri-home-8-line"></i>
                            Inicio
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link collapsed" data-bs-target="#pages" data-bs-toggle="collapse" aria-expanded="false">
                            <i class="ri-list-view"></i>
                            Categorias
                        </a>
          
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link collapsed" data-bs-target="#pages" data-bs-toggle="collapse" aria-expanded="false">
                            <i class="ri-list-view"></i>
                            Subcategorias
                        </a>

                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link collapsed" data-bs-target="#posts" data-bs-toggle="collapse"
                            aria-expanded="false">
                            <i class="ri-list-check"></i>
                            Marcas
                        </a>

                    </li>

                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link collapsed" data-bs-target="#posts" data-bs-toggle="collapse" aria-expanded="false">
                            <i class="ri-box-3-line"></i>
                            <small>Productos</small>
                        </a>

                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link collapsed" data-bs-target="#auth" data-bs-toggle="collapse"
                            aria-expanded="false">
                            <i class="ri-user-line"></i>
                            Usuarios
                        </a>
                </ul>
            </div>
        </aside>
        <div class="main">
            <nav class="navbar navbar-expand px-3 border-bottom">
                <button class="btn" id="sidebar-toggle" type="button">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="navbar-collapse navbar">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a href="#" data-bs-toggle="dropdown" class="nav-icon pe-md-0">
                                <img src="../image/profile.jpg" class="avatar img-fluid rounded" alt="">
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a href="#" class="dropdown-item">Perfil</a>
                                <a href="#" class="dropdown-item">Configuracion</a>
                                <a href="#" class="dropdown-item">Salir</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>

            <main class="content px-3 py-2">
                <div class="container-fluid">
                    <div class="mb-3">
                        <h4>Panel de administración</h4>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-6 d-flex">
                            <div class="card flex-fill border-0 illustration">
                                <div class="card-body p-0 d-flex flex-fill">
                                    <div class="row g-0 w-100">
                                        <div class="col-6">
                                            <div class="p-3 m-1">
                                                <h4>Bienvenido, Admin</h4>
                                                <p class="mb-0">Panel de administración, Import Hermoza</p>
                                            </div>
                                        </div>
                                        <div class="col-6 align-self-end text-end">
                                            <img src="../image/customer-support.jpg" class="img-fluid illustration-img"
                                                alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 d-flex">
                            <div class="card flex-fill border-0">
                                <div class="card-body py-4">
                                    <div class="d-flex align-items-start">
                                        <div class="flex-grow-1">
                                            <h4 class="mb-2">
                                                $ 78.00
                                            </h4>
                                            <p class="mb-2">
                                                Ganancias totales
                                            </p>
                                            <div class="mb-0">
                                                <span class="badge text-success me-2">
                                                    +9.0%
                                                </span>
                                                <span class="text-muted">
                                                    Mes anterior
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Table Element -->
                    <div class="card border-0">
                        <div class="card-header">
                            <h5 class="card-title">
                                Agregar nueva categoria
                            </h5>
                        </div>
                        <form action="#" method="post" class="p-2">
                            <div class="mb-3">
                                <label for="nombrecategoria" class="form-label fs-6">Nombre</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="nombrecategoria"
                                    id="nombrecategoria"
                                    aria-describedby="helpId"
                                    placeholder="Nombre"
                                />
                            </div>

                            <button
                                type="submit"
                                class="btn btn-success"
                            >
                                Agregar
                            </button>

                            <a
                                name=""
                                id=""
                                class="btn btn-danger"
                                href="index.php"
                                role="button"
                                >Cancelar</a
                            > 
                        </form>
                    </div>
                </div>
            </main>
            <a href="#" class="theme-toggle">
                <i class="ri-moon-fill fa-moon"></i>
                <i class="ri-sun-line fa-sun"></i>
            </a>
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row text-muted">
                        <div class="col-6 text-start">
                            <p class="mb-0">
                                <a href="#" class="text-muted">
                                    <strong>Import Hermoza S.A.C</strong>
                                </a>
                            </p>
                        </div>
                        <div class="col-6 text-end">
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <a href="#" class="text-muted">Desarrollado por Corporacion Sivana</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/2.0.2/js/dataTables.js"></script>
    <script src="../js/script.js"></script>
    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->
    <!-- <script src="../js/sweetalert.js"></script> -->
    <!-- <script>
        $(document).ready(function(){
            $("#tabla_id").DataTable({
                "pages":3,
                lengthMenu:[
                    [3,10,25,50],
                    [3,10,25,50]
                ],
                "language":{
                    "url": "https://cdn.datatables.net/plug-ins/1.13.1/i18n/es-ES.json"
                }
            });
        });
    </script> -->
    
    <?php
    // function showAlert($icon, $title, $message) {
    //     echo 
    //     '<script>
    //     Swal.fire({
    //         icon: "' . $icon . '",
    //         title: "' . $title . '",
    //         text: "' . $message . '"
    //     });
    //     </script>';
    // }
    ?>

    <script>
        // function showAlert($icon, $title, $message) {
        //     Swal.fire({
        //         icon: "' . $icon . '",
        //         title: "' . $title . '",
        //         text: "' . $message . '"
        //     });
        
        // }
    </script>

    <?php
        // function showAlert($icon, $title, $message) {
        //     echo 
        //     '<script>
        //     document.addEventListener("DOMContentLoaded", function() {
        //         Swal.fire({
        //             icon: "' . $icon . '",
        //             title: "' . $title . '",
        //             text: "' . $message . '"
        //         });
        //     });
        //     </script>';
        // }
    ?>

</body>

</html>
