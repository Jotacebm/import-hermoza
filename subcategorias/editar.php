<?php 
    include("../conexion/bd.php");

?>

<?php
    $consulta = $conexion->prepare("SELECT * FROM categoria");
    $consulta->execute();
    $registro_categoria = $consulta->fetchAll(PDO::FETCH_ASSOC);
?>

<?php
    if(isset($_GET['txtID'])){
        $txtID = isset($_GET['txtID'])?$_GET['txtID']:"";
        $consulta2 = $conexion->prepare("SELECT * FROM subcategoria WHERE id_subcategoria=:id");
        $consulta2->bindParam(":id", $txtID);
        $consulta2->execute();
        $registro_subcategoria = $consulta2->fetch(PDO::FETCH_LAZY);
    }
?>

<?php
    if($_POST){
        print_r($_POST);
        try {
            $txtID = isset($_POST['idsubcategoria'])?$_POST['idsubcategoria']:"";
            $nombresubcategoria = isset($_POST['nombresubcategoria'])?$_POST['nombresubcategoria']:"";
            $idcategoria = isset($_POST['idcategoria'])?$_POST['idcategoria']:"";

            // echo "Valor de id_categoria a actualizar: " . $idcategoria;

            $consulta3 = $conexion->prepare("UPDATE subcategoria SET nombre=:nombre, id_categoria=:idcategoria WHERE id_subcategoria=:id");
            $consulta3->bindParam(":nombre", $nombresubcategoria);
            $consulta3->bindParam(":idcategoria", $idcategoria);
            $consulta3->bindParam(":id", $txtID);
            $consulta3->execute();
            // header("Location:index.php");
            echo '
                <script>
                    document.addEventListener("DOMContentLoaded", function(){
                        Swal.fire({
                            icon: "success",
                            title: "Exito",
                            text: "Registro actualizado con exito"
                        }).then(function(){
                            window.location.href="index.php";
                        })
                    })
                </script>
            ';
        } catch (PDOException $e) {
            echo "Error en la base de datos: " . $e->getMessage();
        }

    }
?>


<!DOCTYPE html>
<html lang="es" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subategorias</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css">
    <!-- <script src="https://kit.fontawesome.com/ae360af17e.js" crossorigin="anonymous"></script> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.2.0/remixicon.css">
    <!-- <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css"> -->
    <link rel="stylesheet" href="../css/style.css">
    <!-- CDN datatable -->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.2/css/dataTables.dataTables.css" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

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
                        <!-- <ul id="pages" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                            <li class="sidebar-item">
                                <a href="#" class="sidebar-link">Page 1</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="#" class="sidebar-link">Page 2</a>
                            </li>
                        </ul> -->
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
                    </li>

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
                                <img src="image/profile.jpg" class="avatar img-fluid rounded" alt="">
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
                                            <img src="image/customer-support.jpg" class="img-fluid illustration-img"
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
                                Agregar Subategoria
                            </h5>
                        </div>
                        <div class="card-body table-responsive">
                            <form action="#" method="post">
                                <div class="mb-3">
                                    <label for="idsubcategoria" class="form-label">Id.</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        name="idsubcategoria"
                                        id="idsubcategoria"
                                        aria-describedby="helpId"
                                        placeholder="ID Subcategoria"
                                        readonly
                                        value="<?php echo $registro_subcategoria['id_subcategoria'];?>"
                                        
                                    />
                                    <small id="helpId" class="form-text text-muted">Help text</small>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="nombresubcategoria" class="form-label">Nombre:</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        name="nombresubcategoria"
                                        id="nombresubcategoria"
                                        aria-describedby="helpId"
                                        placeholder="Nombre de la subcategoria"
                                        value = "<?php echo $registro_subcategoria['nombre']; ?>"
                                        
                                    />
                                </div>
                                <div class="mb-3">
                                    <label for="idcategoria" class="form-label">ID Categoria</label>
                                    <select
                                        class="form-select form-select-lg"
                                        name="idcategoria"
                                        id="idcategoria"
                                    >
                                    <?php foreach($registro_categoria as $categoria){ ?>
                                        <option 
                                        <?php echo ($registro_subcategoria['id_categoria']== $categoria['id_categoria'])?"Selected":"" ?>
                                        value="<?php echo $categoria['id_categoria']; ?>">
                                            <?php echo $categoria['nombre'];?>
                                        </option>
                                    <?php } ?>
                                    </select>
                                </div>

                                <button
                                    type="submit"
                                    class="btn btn-success"
                                >
                                    Actualizar
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
                </div>
            </main>
            <a href="#" class="theme-toggle">
                <!-- <i class="fa-regular fa-moon"></i>
                <i class="fa-regular fa-sun"></i> -->
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../js/script.js"></script>
    <script
    src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" 
    crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/2.0.2/js/dataTables.js"></script>

    <!-- cdn sweet alert -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->

    <script>
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
    </script>
</body>

</html>
