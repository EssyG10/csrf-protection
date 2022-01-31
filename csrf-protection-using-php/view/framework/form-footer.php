<?php
require_once __DIR__ . '/../../lib/SecurityService.php';
$antiCSRF = new \Phppot\SecurityService\securityService();
$antiCSRF->insertHiddenToken();
