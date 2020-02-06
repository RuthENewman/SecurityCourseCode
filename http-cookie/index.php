<?php

    $expiry = new DateTime('+1 hour');

    setcookie("username", "ruthnewman", $expiry->getTimestamp(), '/', null, null, true);


?>