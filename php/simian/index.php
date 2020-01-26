<?php
// Takes raw data from the request
header('Access-Control-Allow-Headers: "Origin, X-Requested-With, Content-Type, Accept"');
header("Access-Control-Allow-Origin: *", true);

include '../connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $json = file_get_contents('php://input'); // to object
    //$json = $_POST['dna']; // to string

    //$json = '{ "dna": ["ATGCGA", "CAGTGC", "TTATGT", "AGAAGG", "CCCCTA", "TCACTG"]}'; // to test

    $data = json_decode($json);

    $dna = $data->dna[0] . ' ' . $data->dna[1] . ' ' . $data->dna[2] . ' ' . $data->dna[3] . ' ' . $data->dna[4] . ' ' . $data->dna[5] . '';

    // run python
    $output_py = shell_exec('python isSimian.py ' . $dna . ''); // split 'ATGCGA CAGTGC TTATGT AGAAGG CCCCTA TCACTG'

    $str1 = "INSERT INTO `db_simian`(`dna`, `status_dna`) VALUES ('" . $dna . "', '" . strval($output_py) . "')";

    $conn = new mysqli($servername, $username, $password, $dbname) or die('error');
    mysqli_query($conn, $str1) or die('DNA JA REGISTRADO');

    if ($output_py == 0) { // if false(0) return 403
        header('HTTP/1.0 403 Forbidden'); // add output only as confirmation
        echo $output_py; 
    } else { // if true(1) return 200
        echo $output_py; // add output only as confirmation
    }
}
