<?php 
    include "config.php" ;
    
    if(isset($_POST["search"])){
        if(!empty($_POST["motCle"])){

            $motCle = $_POST["motCle"];
            $symb = '%';
            $motCle = $symb . $motCle . $symb ;
            //echo $_POST["motCle"];?>

            <!DOCTYPE html>
            <html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
                    <link rel="stylesheet" href="styleresultsearch.css">
                    <title>Resultats des recherches</title>
                </head>
                <body>
                <h2>Resultats des recherches</h2>


                    <?php 
                        $reqSearch = $connexionDataBase ->prepare('SELECT * FROM etudiant WHERE nom LIKE :nomEtudiant');

                        $reqSearch -> execute(array(
                            'nomEtudiant'=>  $motCle
                        ));

                    ?>

                    <div class="result-search">

                        <?php
                            if($reqSearch -> rowCount() >= 1){
                            ?>

                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">NOM</th>
                                        <th scope="col">AGE</th>
                                        <th scope="col">NIVEAU</th>
                                        <th scope="col">ACTIONS</th>

                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                            

                                                while($resulSearch = $reqSearch -> fetch()){ 
                                                        


                                                ?>
                                    
                                                    <tr>
                                                        <th scope="row"><?php echo $resulSearch['id'] ;?></th>
                                                        <td><?php echo $resulSearch['nom'] ;?></td>
                                                        <td><?php echo $resulSearch['age'] ;?></td>
                                                        <td><?php echo $resulSearch['niveau'] ;?></td>
                                                    </tr>
                                        
                                        
                                                <?php 
                                    
                                                    }
                                                                                            
                                                
                            

                                        ?>
                                    

                                    </tbody>
                                </table>
                            

                            <?php
                                }
                                else{
                                    echo "Aucun resultat" ;
                                }
                            ?>

                    </div>


                    
                    

                

                    
                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

                </body>
            </html>

        <?php 
        }
    }
?>