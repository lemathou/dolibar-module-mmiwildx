#!/bin/php
<?php

$script_file = basename(__FILE__);

// Include Dolibarr environment
require_once __DIR__.'/../master_load.inc.php';

dol_include_once('mmiwildx/class/mmi_wildx_sync.class.php');

mmi_wildx_sync::fixtels();

