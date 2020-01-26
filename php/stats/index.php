<?php
// Takes raw data from the request
header('Access-Control-Allow-Headers: "Origin, X-Requested-With, Content-Type, Accept"');
header("Access-Control-Allow-Origin: *", false);

include '../connect.php';

$str1 = "SELECT count(*) as total FROM db_simian WHERE status_dna = 1";

$str2 = "SELECT count(*) as total FROM db_simian WHERE status_dna = 0";

$conn = new mysqli($servername, $username, $password, $dbname) or die('aui');

if ($conn->connect_error) {
    $msg = '[{"message" => "Erro de acesso ao banco"}]';
    echo $msg;
} else {

    $human = mysqli_query($conn, $str1) or die('error');
    $row_human = $human->fetch_assoc();

    $mutant = mysqli_query($conn, $str2) or die('error');
    $row_mutant = $mutant->fetch_assoc();

    $ratio = ((float) $row_mutant['total']) / ((float) $row_human['total']);

    $resposta = '{"count_mutant_dna": ' . $row_mutant['total'] . ', "count_human_dna": ' . $row_human['total'] . ', "ratio": ' . $ratio . '}';
    $resposta_json = json_encode($resposta);

    header('Content-Type: application/json');

    echo $resposta_json;
}

mysqli_close($conn);
