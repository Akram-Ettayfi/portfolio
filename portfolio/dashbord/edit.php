<?php
require_once "auth.php";
require "database.php";
 include 'dashnav.php';



$user = $_SESSION['auth'];


$id = $_GET['projet'];

$projectError = "";
$descError = "";
$techError = "";
$gitError = "";





$db = Database::connect();
$sql2 = "SELECT * FROM projets WHERE id=$id";
$stmt2 = $db->query($sql2);
$rows = $stmt2->fetch(PDO::FETCH_ASSOC);
Database::disconnect();

if(isset($_POST['submit'])){
  $nomprojet = $_POST['nomprojet'];
  $description = $_POST['description'];
  $techno = $_POST['techno'];
  $git = $_POST['git'];
  
  $file = $_FILES['filepic']['name'];
  $tmp_name = $_FILES['filepic']['tmp_name'];
  if($_FILES['filepic']['error']==0){
      move_uploaded_file($tmp_name, "img/$file");
  }
  $db = Database::connect();
  $sql = "UPDATE projets set  imgprojet=:i, nomprojet=:n, description=:d, techno=:t, git=:g  WHERE id=$id";

  $stmt = $db->prepare($sql);
  $stmt->bindValue('i',$file,PDO::PARAM_STR);
  $stmt->bindValue('n',$nomprojet,PDO::PARAM_STR);
  $stmt->bindValue('d',$description,PDO::PARAM_STR);
  $stmt->bindValue('t',$techno,PDO::PARAM_STR);
  
  $stmt->bindValue('g',$git,PDO::PARAM_STR);


  $stmt->execute();


  echo"<div class='alert alert-success' role='alert'>
                        le projet $nomprojet a modifié
                      </div>";


$sql2 = "SELECT * FROM projets WHERE id=$id";
$stmt2 = $db->query($sql2);
$rows = $stmt2->fetch(PDO::FETCH_ASSOC);
//   header("location:dashwork.php");

  
}

?>

<div class="card-body">
                    <form class="" method="POST" enctype="multipart/form-data">
                        <div class="form-group">

                        
                            <label for="exampleInputEmail1">nom de projet</label>
                            <input type="text" name="nomprojet" class="form-control" id="exampleInputEmail1" value="<?=$rows['nomprojet']?>"
                                aria-describedby="emailHelp" placeholder="">
                                <small id="emailHelp" class="form-text text-muted"><?= $projectError ?></small>

                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">description de projet</label>
                            <input type="text" name="description" id="inp" class="form-control" id="exampleInputPassword1" value="<?=$rows['description']?>"
                            
                                placeholder="">
            
        <small id="emailHelp" class="form-text text-muted"><?= $descError ?></small>

                        </div>
                        <div class="form">
                            <label for="exampleInputPassword1">image de projet</label>
                            <input type="file" name="filepic" class="form-control" id="exampleInputPassword1"
                                placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Technologie</label>
                            <input type="text" name="techno" class="form-control" id="exampleInputPassword1" value="<?=$rows['techno']?>"
                                placeholder="">
        <small id="emailHelp" class="form-text text-muted"><?= $techError ?></small>

                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">lien vers Github</label>
                            <input type="text" name="git" class="form-control" id="exampleInputPassword1" value="<?=$rows['git']?>"
                                placeholder="">
        <small id="emailHelp" class="form-text text-muted"><?= $gitError ?></small>

                        </div>
                        <input type="submit" name="submit" class="btn btn-primary" value="modifier">
                    </form>
                </div>
            </div>
        </div>