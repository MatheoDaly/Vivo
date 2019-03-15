<?php



// Cela me sert seulement pour teste ma fonction en js
// je veux un format retour tel que echo json_ecode(array(array("Ma concentration", array(Valeur1, Valeur2, Valeur3, etc))))

if(isset($_POST['type']) & $_POST['type'] == 1){
    echo json_encode(array(array("Calorie", array(1, 2, 3))));
    }
else if(isset($_POST['type']) & $_POST['type'] == 2) {
    echo json_encode(array(array("Calorie", array(1, 2, 3, 4, 5, 6, 7))));
} 
else if(isset($_POST['type']) & $_POST['type'] == 3) {
    echo json_encode(array(array("Calorie", array(1, 2, 3, 4, 5, 6))));
} 
else if(isset($_POST['type']) & $_POST['type'] == 4) {
    echo json_encode(array(array("Calorie", array(1, 2, 3, 4, 5, 6))));
} else if(isset($_POST['type']) & $_POST['type'] == 5) {
    echo json_encode(array(array("Calorie", array(1, 2, 3))));
} 
?>
