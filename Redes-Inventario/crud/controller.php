<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["edit"])) {
        playM("This is edit");
    }
    if(isset($_POST['add'])){
        playM("This is add");
    }
}
function playM($message){
    echo "$message";
}