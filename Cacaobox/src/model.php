<?php

$port=3306;
$server="localhost";
$base="s4-gp95";
$user="s4-gp95";
$mdp="^Randk7#q93DApag";

try {
    $pdo=new PDO("mysql:host=$server;port=$port;dbname=$base;charset=UTF8",$user,$mdp);
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}
catch (Exception $e){
    die('Erreur :'.$e->getMessage());
}


function get_result($requete){
    global $pdo;
    $requete=$pdo->query($requete);
    return $requete ->fetch(PDO::FETCH_ASSOC);
}
function get_results($requete){
    global $pdo;
    $requete=$pdo->query($requete);
    return $requete ->fetchAll(PDO::FETCH_ASSOC);
}
function delete($requete){
    global $pdo;
    $pdo->query($requete);

}

function set_insert($table, $data)
{
    global $pdo;
    $requete = "";
    $values = "";
    foreach ($data as $key => $value) {
        if ($key && $value) {
            if (!!$requete) {
                $requete .= ", ";
                $values .= "', '";
            }
            $requete .= $key;
            $values .= $value;
        }
    }
    $requete = "INSERT INTO $table ($requete) VALUES ('$values')";
    $stmt = $pdo->query($requete);
}

