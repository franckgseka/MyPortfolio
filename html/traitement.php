<?php
$host='localhost';
$port=8889;
$dbname='form_row';
$user='root';
$pwd='root';

    try {
        $newBD=new PDO("mysql:host=$host;port=$port;dbname=$dbname", $user, $pwd);

    }catch(PDOException $e){
        die('Erreur :'.$e->getMessage());
    }

    if (isset($_POST['name'])&&
        isset($_POST['email'])&&
        isset($_POST['subject'])&&
        isset($_POST['message'])) {
            $insertion=$newBD->prepare('INSERT INTO users VALUES(null,:name,:email,:subject,:message)');

            $insertion->bindValue(':name',$_POST['name']);
            $insertion->bindValue(':email',$_POST['email']);
            $insertion->bindValue(':subject',$_POST['subject']);
            $insertion->bindValue(':message',$_POST['message']);
            $verification= $insertion->execute();
                if ($verification) {
                    echo "Insertion réussie";
                }else{
                    echo "Echec dinsertion";
                }


    }else{
            echo "Une variable n'est pas declaree et ou est null";
    }

?>