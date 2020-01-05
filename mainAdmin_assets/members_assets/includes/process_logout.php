<?php
    session_start();
    unset($_SESSION['position']);
    unset($_SESSION['name']);
    unset($_SESSION['date']);
    session_destroy();
    header("Location: /payroll/index");
?>