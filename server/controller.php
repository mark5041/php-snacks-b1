<?php
include __DIR__ . '/db.php';

header('Content-Type: application/json');

if (isset($_GET['cambio']) && isset($_GET['size'])) 
{
    $cambio = $_GET['cambio'];
    $size = $_GET['size'];
    switch (true) {
        case $cambio != 'all' && $size != 'all':
            foreach ($cars as $element) 
            {
                if ($cambio == $element['Cambio'] && $size == $element['Tipo']) 
                {
                    $filter[] = $element;
                }
            }

            echo json_encode(
                [
                    'length' => count($filter),
                    'response' => $filter
                ]
            );
        break;

        case $cambio != 'all':
            foreach ($cars as $element) 
            {
                if ($cambio == $element['Cambio']) 
                {
                    $filter[] = $element;
                }
            }
            
            echo json_encode(
                [
                    'length' => count($filter),
                    'response' => $filter
                ]
            );
        break;

        case $size != 'all':
            foreach ($cars as $element) 
            {
                if ($size == $element['Tipo']) 
                {
                    $filter[] = $element;
                }
            }
            
            echo json_encode(
                [
                    'length' => count($filter),
                    'response' => $filter
                ]
            );
        break;
        
        default:
            echo json_encode(
                [
                    'length' => count($cars),
                    'response' => $cars
                ]
            );
        break;
    }
}


?>