<?php
session_start();
session_unset();
session_destroy();
session_gc();
//echo "<div style='background-color: #262f36'>sdfsdf</div>"
header("location: /AgentInterface/");
exit();