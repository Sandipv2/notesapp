<?php
$block_btn_style = "
    display:flex;
    justify-content: center;
    align-items: center;
    opacity: .3
";
echo "
<div class='block-btn' style = '$block_btn_style'>
        <a href='blockuser.php'>
            <button class='btn btn-danger btn-sm' onclick=blockuser()>Block Me</button>
        </a>
</div>

";
?>