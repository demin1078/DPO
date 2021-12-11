<?php include('core/db.php');
    $id_mes = $_GET['id_mes'];
    print_r($id_mes);
    mysqli_query($connection, "DELETE FROM message WHERE id_message = '$id_mes'");
    echo '<script>alert("Сообщение успешно удалено!") </script> ';
    echo '<script> window.history.back();  </script> '
?>