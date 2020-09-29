
<?php include 'dashnav.php';
require_once "auth.php";
require "database.php"


?>
<nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
    <div class="container-fluid">
        <div class="navbar-wrapper">
            <div class="navbar-toggle">
                <button type="button" class="navbar-toggler">
                    <span class="navbar-toggler-bar bar1"></span>
                    <span class="navbar-toggler-bar bar2"></span>
                    <span class="navbar-toggler-bar bar3"></span>
                </button>
            </div>
            <a class="navbar-brand" href="#pablo"></a>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation"
            aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navigation">
        </div>
    </div>
</nav>
<!-- End Navbar -->
<div class="panel-header">
    <div class="header text-center">
        <h2 class="title">PROJET</h2>
    </div>
</div>
<!-------------------------------------------ajout projet--------------------------------------------------------- -->
<!-------------------------------------------ajout projet--------------------------------------------------------- -->
<!-------------------------------------------ajout projet--------------------------------------------------------- -->
<div class="content">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Ajouté projet</h4>
                </div>
                <?php
            if(isset($_POST['submiting'])){
                $nomprojet = $_POST['nomprojet'];
                $description = $_POST['description'];
                $techno = $_POST['techno'];
              
                $git = $_POST['git'];
                
                $filephtoname = $_FILES['filepic']['name'];
                $tmp_name = $_FILES['filepic']['tmp_name'];
                if($_FILES['filepic']['error']==0){
                    move_uploaded_file($tmp_name, "img/$filephtoname");
                }
 
                

                $db = Database::connect();
                        $sql = "INSERT INTO projets VALUES(NULL,?,?,?,?,?)";
                        $stmt = $db->prepare($sql);
                        $stmt->bindValue(1,$filephtoname,PDO::PARAM_STR);
                        $stmt->bindValue(2,$nomprojet,PDO::PARAM_STR);
                        
                        $stmt->bindValue(3,$description,PDO::PARAM_STR);
                        $stmt->bindValue(4,$techno,PDO::PARAM_STR);
                        
                        $stmt->bindValue(5,$git,PDO::PARAM_STR);
                        
                        echo"<div class='alert alert-success' role='alert'>
                        le projet $nomprojet a ajouter
                      </div>";
                        $stmt->execute();
                        $db = Database::disconnect();



                        
                    }
                    
                    



            
                      
                        
                    ?>
                <div class="card-body">
                    <form class="" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="exampleInputEmail1">nom de projet</label>
                            <input type="text" name="nomprojet" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">description de projet</label>
                            <textarea type="text" name="description" class="form-control" id="exampleInputPassword1"
                                placeholder=""></textarea>
                        </div>
                        <div class="form">
                            <label for="exampleInputPassword1">image de projet</label>
                            <input type="file" name="filepic" class="form-control" id="exampleInputPassword1"
                                placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Technologie</label>
                            <textarea type="text" name="techno" class="form-control" id="exampleInputPassword1"
                                placeholder=""></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">lien vers Github</label>
                            <input type="text" name="git" class="form-control" id="exampleInputPassword1"
                                placeholder="">
                        </div>
                        <input type="submit" name="submiting" class="btn btn-primary" value="ajouter">
                    </form>
                </div>
            </div>
        </div>
        <!--delete projet-->
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Delete projet</h4>
                    <form action="" method="POST">
                        Choisi le projet que vous voulez supprimer ?
                        <select class='form-control form-control-lg p-2 rounded-left' name='opt' id="">
                            <option value=''>select projet</option>"
                            <?php
                              
                              $add = Database::connect();
                                $rep = $add->query('SELECT * FROM projets ORDER BY id' );
                                while($x = $rep->fetch()){
                                echo"<option  value='$x[0]' >$x[2]</option>";
                                }
                                $c=$_POST['opt'];
                            ?>
                        </select>
                        <input type="submit" name='supremer' class="btn btn-primary ml-5 pl-5 pr-5" value="supprimer">
                    </form>
                    <?php   
                     
                      if(isset($_POST['supremer'])){
                     $del ="DELETE FROM projets WHERE id = $c";
                      $add->query($del);
                      echo "<div class='alert alert-danger' role='alert'>
                      le projet a supprimer
                    </div>";
                    }
                    ?>






<?php include 'dashfooter.php'?>







    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">edit projet</h4>
            </div>
            <?php
                include 'projet.php' ?>

        </div>