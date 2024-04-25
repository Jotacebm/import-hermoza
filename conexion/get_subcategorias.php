<?php include("../conexion/bd.php"); ?>

<?php
    $idCategoria = $_POST['id_categoria'];

    $sql = $conexion->prepare("SELECT * FROM subcategoria WHERE id_categoria =:idCategoria");
    $sql->bindParam(":idCategoria", $idCategoria);
    $sql->execute();
    $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);

    $respuesta = "<option value='0'>Seleccionar</option>";

    foreach($resultado as $row){
        $respuesta .=  "<option value = '" .$row['id_subcategoria']. "'>" .$row['nombre']. "</option>";
    }

    echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);

?>
