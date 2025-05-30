<?php
    include "common/user.session.php";
    session_unset();
    session_destroy();
    header("location:../index.php?message=thanks");
?>