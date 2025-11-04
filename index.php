<?php
// ===============================
//  PROYECTO: LAS CABRAS DE SATURNO
// ===============================
//
// Contexto: La colonia Capra Majoris, en los anillos de Saturno,
// ha sido impactada por bolas de queso ardiente procedentes del
// cinturón de Meteorquesos. Este programa ayudará a los técnicos
// a analizar los daños y calcular las pérdidas (y ganancias).
//
// Simbología del mapa ($capraMajoris):
// "0" -> terreno rocoso
// "~" -> atmósfera de metano
// "C" -> zona habitada (corrales de cabras)
//
// Los impactos se almacenan en el array $impacts
// como coordenadas [fila, columna].
//
// =========================================
// MAPA ORIGINAL DE CAPRA MAJORIS
// =========================================

$capraMajoris = [
    ['~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~'],
    ['~', '~', '~', '~', '~', '0', '0', 'C', '0', 'C', '0', '0', 'C', '0', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~'],
    ['~', '~', '~', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~'],
    ['~', '~', '~', '0', '0', '0', '0', '0', '0', 'C', '0', '0', '0', '0', 'C', '0', '~', '~', '~', '~', '~', '~', '~', '~'],
    ['~', '~', '~', '~', '~', '0', '0', '0', '0', '0', 'C', 'C', '0', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~'],
    ['~', '~', '~', '~', '~', '~', '0', '0', '0', '0', '0', 'C', '0', '0', 'C', 'C', 'C', '0', '~', '~', '~', '~', '~', '~'],
    ['~', '~', '0', '0', '0', 'C', '0', 'C', 'C', '0', '0', '0', '0', '0', '0', '0', 'C', '0', '0', '0', 'C', '0', '0', '~'],
    ['~', '~', '~', '~', '~', '~', '0', '0', 'C', '0', '0', '0', 'C', '0', '0', '0', '0', '0', '0', 'C', '0', '0', '0', '~'],
    ['~', '~', '~', '~', '~', '~', '~', '~', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '~'],
    ['~', '~', '~', '~', '~', '0', '0', 'C', '0', '0', '0', '0', '0', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~'],
    ['~', '~', '~', '~', '~', '0', '0', '0', '0', '0', 'C', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '~', '~', '~'],
    ['~', '~', '~', '0', '0', '0', '0', '0', '0', '0', 'C', '0', '0', '0', '0', '0', '0', '0', '0', '~', '~', '~', '~', '~'],
    ['~', '0', '0', '0', '0', '0', '0', '0', '0', 'C', '0', '0', '0', 'C', '0', '0', '0', '0', '0', 'C', '0', '~', '~', '~'],
    ['~', '~', '~', '~', '~', '~', '~', '~', '~', '0', '0', '0', '0', 'C', '0', '0', '~', '~', '~', '~', '~', '~', '~', '~'],
    ['~', '~', '~', '~', '~', '~', '~', '~', '~', '0', '0', '0', 'C', 'C', 'C', '0', '0', 'C', '0', '0', '0', '~', '~', '~'],
    ['~', '~', '~', '~', '0', 'C', 'C', '0', '0', 'C', '0', '0', '0', 'C', '0', '0', '0', '0', '~', '~', '~', '~', '~', '~'],
    ['~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '0', 'C', '0', '0', '0', '~', '~', '~', '~', '~', '~', '~', '~'],
    ['~', '~', '~', '~', '~', '~', '~', '~', '0', '0', '0', 'C', '0', '0', '0', '0', '0', 'C', '0', 'C', '0', '0', '0', '~'],
    ['~', '~', '~', '0', 'C', '0', '0', '0', '0', '0', '0', '0', '0', 'C', '0', '0', '0', '~', '~', '~', '~', '~', '~', '~'],
    ['~', '~', '~', '~', '~', '~', '~', '~', '~', '0', '0', '0', 'C', '0', '0', 'C', '0', '~', '~', '~', '~', '~', '~', '~'],
    ['~', '~', '~', '~', '0', '0', '0', '0', 'C', '0', '0', '0', '0', 'C', '0', '~', '~', '~', '~', '~', '~', '~', '~', '~'],
    ['~', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'C', '0', '0', '0', '0', '0', '0', '~', '~', '~', '~', '~', '~'],
    ['~', '~', '~', '~', '~', '0', '0', '0', '0', '0', 'C', '0', '0', '0', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~'],
    ['~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~']
];

// Coordenadas [fila, columna] de los impactos de queso
$impacts = [
    [20, 4],
    [2, 13],
    [13, 12],
    [3, 17],
    [2, 13],
    [5, 19],
    [6, 18],
    [5, 2],
    [20, 13],
    [9, 7],
    [5, 9],
    [15, 16],
    [16, 13],
    [16, 9],
    [16, 0],
    [3, 19],
    [19, 8],
    [1, 16],
    [18, 4],
    [21, 23],
    [7, 17],
    [22, 15],
    [21, 6],
    [14, 8],
    [12, 23],
    [7, 7],
    [22, 4],
    [3, 21],
    [2, 3],
    [8, 11],
    [0, 4],
    [7, 21],
    [11, 4],
    [7, 15],
    [6, 17],
    [5, 19],
    [4, 19],
    [4, 7],
    [23, 21],
    [15, 20],
    [2, 9],
    [21, 2],
    [1, 13],
    [7, 10],
    [21, 5],
    [13, 17],
    [2, 14],
    [11, 14],
    [22, 17],
    [18, 22],
    [2, 23],
    [3, 1],
    [18, 6],
    [17, 12],
    [18, 18],
    [20, 2],
    [3, 14],
    [11, 21],
    [6, 5],
    [6, 2],
    [12, 23],
    [18, 18],
    [21, 6],
    [10, 12],
    [5, 4],
    [16, 19],
    [8, 10],
    [12, 21],
    [15, 1],
    [20, 14],
    [3, 20],
    [6, 19],
    [20, 13],
    [15, 4],
    [10, 2],
    [5, 16],
    [20, 1],
    [12, 13],
    [11, 5],
    [12, 14],
    [8, 3],
    [6, 8],
    [19, 7],
    [16, 9],
    [13, 20],
    [3, 5],
    [1, 0],
    [20, 14],
    [12, 21],
    [12, 16],
    [15, 7],
    [9, 1],
    [1, 18],
    [20, 6],
    [8, 6],
    [22, 1],
    [10, 22],
    [19, 19],
    [7, 16],
    [8, 8]
];


function mostrarMapaPlantilla($mapa){
    for ($i=0; $i < count($mapa) ; $i++) { 
        for ($j=0; $j < count($mapa[$i]) ; $j++) { 
            echo $mapa [$i] [$j];
        }
        echo "<br>";
    }
    echo "<br>";
}
function corralesAfectadas($mapa,$casillas){
    $filaAfectada = [];
    $columnaAfectada = [];
    for ($i=0; $i < count($casillas) ; $i++) { 
        $filaAfectada[] = $casillas[$i][0];
        $columnaAfectada[] = $casillas[$i][1];
    }
    for ($i=0; $i < count($mapa) ; $i++) { 
        for ($j=0; $j < count($mapa[$i]) ; $j++) {
            for ($x = 0; $x < count($filaAfectada); $x++){
                if ($filaAfectada[$x] == $i && $columnaAfectada[$x] == $j&&$mapa[$i][$j] == "C"){ 
                    $mapa[$i][$j] = "Q";
                }
            }
        }
    }
    return $mapa; 
}
function calcuarDesodorante($mapa){
    $contador = 0;
    for ($i=0; $i <count($mapa) ; $i++) { 
        for ($j=0; $j <count($mapa[$i]) ; $j++) { 
            if ($mapa[$i][$j] == "Q") {
                $contador ++;
            }
        }
    }
    echo "Tenemos un total de: " . $contador . " Corrales afectados , Lo cual supone un total de : " . $contador * 3000 ." cabras <br>";
    echo "Para hacer la limpieza necesitaremos: " . ($contador * 3000)/100 . " Litros de desodorante<br><br>";
}

function zonasAfectadas($mapa,$casillas){
    $filaAfectada = [];
    $columnaAfectada = [];
    for ($i=0; $i < count($casillas) ; $i++) { 
        $filaAfectada[] = $casillas[$i][0];
        $columnaAfectada[] = $casillas[$i][1];
    }
    for ($i=0; $i < count($mapa) ; $i++) { 
        for ($j=0; $j < count($mapa[$i]) ; $j++) {
            for ($x = 0; $x < count($filaAfectada); $x++){
                if ($filaAfectada[$x] == $i && $columnaAfectada[$x] == $j&&$mapa[$i][$j] == "C"){ 
                    $mapa[$i][$j] = "Q";
                }
                elseif ($filaAfectada[$x] == $i && $columnaAfectada[$x] == $j&&$mapa[$i][$j] == "0"){ 
                    $mapa[$i][$j] = "X";
                }
                elseif ($filaAfectada[$x] == $i && $columnaAfectada[$x] == $j&&$mapa[$i][$j] == "~"){ 
                    $mapa[$i][$j] = "S";
                }
            }
        }
    }
    return $mapa; 
}
function calcularDanos($mapa){
    $contador = 0;
    $contador2 = 0;
    for ($i=0; $i <count($mapa) ; $i++) { 
        for ($j=0; $j <count($mapa[$i]) ; $j++) { 
            if ($mapa[$i][$j] == "Q") {
                $contador ++;
            }
            elseif ($mapa[$i][$j] == "X") {
                $contador2 ++;
            }
        }
    }
    echo "Limpiar ".$contador2."km² de terreno rocoso cuesta : " . $contador2 * 75000 . "€<br>";
    echo "Limpiar ".$contador."km² de zona habitada cuesta : " . $contador * 250000 . "€<br>";
    $total = ($contador * 250000) + ($contador2 * 75000); echo "El total de todo seria : " . $total ."€<br>";
    return $total;
}
function calcularAtomosefraLimpia($mapa){
    $contador = 0;
    for ($i=0; $i <count($mapa) ; $i++) { 
        for ($j=0; $j <count($mapa[$i]) ; $j++) { 
            if ($mapa[$i][$j] == "~") {
                $contador ++;
            }
        }
    }
}
function calcularAtomosefraAfectada($mapa){
    $contador = 0;
    for ($i=0; $i <count($mapa) ; $i++) { 
        for ($j=0; $j <count($mapa[$i]) ; $j++) { 
            if ($mapa[$i][$j] == "S") {
                $contador ++;
            }
        }
    }
}
function calcularPecesAtmosfera($mapa){
    $contador = 0;
    $contadorAfectados = 0;
    $contadorLimpio = 0;
    for ($i=0; $i <count($mapa) ; $i++) { 
        for ($j=0; $j <count($mapa[$i]) ; $j++) { 
            if ($mapa[$i][$j] == "S") {
                $contadorAfectados ++;
                $contador ++;
            }
            elseif ($mapa[$i][$j] == "~") {
                $contadorLimpio ++;
                $contador ++;
            }
        }
    }
    $Resultado =(1000 / $contador) * $contadorLimpio;
    $ResultadoAfectado =(1000 / $contador) * $contadorAfectados;
    echo "<br> Con un total de " . $contador . " km² de atmosfera , Tenemos un total de: " . $contadorLimpio ."km² Limpia y " .$contadorAfectados . "km² Afectada lo que da un total de: " . $Resultado . " Toneladas Vivas y " . $ResultadoAfectado ." Muertas <br>";
    return $Resultado;
}
function calcularRecaudacionONG($mapa){
    $contador = 0;
    $contadorAfectados = 0;
    $contadorLimpio = 0;
    for ($i=0; $i <count($mapa) ; $i++) { 
        for ($j=0; $j <count($mapa[$i]) ; $j++) { 
            if ($mapa[$i][$j] == "~") {
                $contadorLimpio ++;
                $contador ++;
            }
            elseif ($mapa[$i][$j] == "S") {
                $contadorAfectados ++;
                $contador ++;
            }
        }
    }
    $Resultado =(((1000 / $contador) * $contadorLimpio)*1000)*7;
    $Resultado = round($Resultado , 2);
    echo "<br>" . $Resultado . "€";
    return $Resultado;
}
function calcularBeneficio($recaudado,$gasto){
    $beneficio = abs($recaudado - $gasto);
    return $beneficio;
}


mostrarMapaPlantilla($capraMajoris);
$mapaAfectados = corralesAfectadas($capraMajoris,$impacts);
mostrarMapaPlantilla($mapaAfectados);
calcuarDesodorante($mapaAfectados);
$mapaAfectadosTodos = zonasAfectadas($capraMajoris,$impacts);
mostrarMapaPlantilla($mapaAfectadosTodos);
$dineroDanos = calcularDanos($mapaAfectadosTodos);
calcularAtomosefraLimpia($mapaAfectadosTodos);
calcularAtomosefraAfectada($mapaAfectadosTodos);
calcularPecesAtmosfera($mapaAfectadosTodos);
$recaudacionONG = calcularRecaudacionONG($mapaAfectadosTodos);
$beneficio = calcularBeneficio($recaudacionONG , $dineroDanos);

echo "<br>".$beneficio;



?>