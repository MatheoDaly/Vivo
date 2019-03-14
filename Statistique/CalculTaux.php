<?php



// Cela me sert seulement pour teste ma fonction en js
if(isset($_POST['type']) & $_POST['type'] == 1){
    echo json_encode(array("Calorie", array(1, 2, 3, 4, 5, 6, 7)));
    }
else if(isset($_POST['type']) & $_POST['type'] == 2) {
    echo json_encode(array(3, 6, 8, 4, 5, 6, 7));
}
?>
