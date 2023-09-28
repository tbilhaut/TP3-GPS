<?php
function Deconnexion(){
   if (isset($_POST['deconnexion'])){
        session_unset();
        session_destroy();
   } 
}
?>