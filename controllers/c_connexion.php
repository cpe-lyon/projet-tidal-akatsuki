<?php
require_once(PATH_MODELS . $page . '.php');
getUserConnection();
require_once(PATH_VIEWS . $page . '.php');
