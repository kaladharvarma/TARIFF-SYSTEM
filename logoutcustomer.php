<?php

session_unset();
session_destroy();

echo '<script>window.alert("Logged out");window.location.href="customer.html";</script>';

?>