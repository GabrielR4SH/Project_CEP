<?php
// CORS 
header("Access-Control-Allow-Origin: http://localhost:8080");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

require __DIR__ . '/src/routes/api.php';

echo "<hr>";
?>
