<?php
function inputs($type, $name, $placeholder ,$value){
    $ele = " <div class=\"form-group\">
    <input type='$type' name='$name' placeholder='$placeholder' class=\"form-control my-4\" value='$value' autocomplete=\"off\">
</div>";
echo $ele;
}

function btns($type, $name, $placeholder ,$value){
    $ele = " <div class=\"form-group\">
    <input type='$type' name='$name' placeholder='$placeholder' class=\"btn btn-success w-100 my-4\" value='$value' autocomplete=\"off\">
</div>";
echo $ele;
}

?>