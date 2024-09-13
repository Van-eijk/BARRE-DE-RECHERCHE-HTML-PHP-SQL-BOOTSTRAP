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

                    <title>Resultats des recherches</title>
                </head>
                <body>
                    <h1>Resultats des recherches</h1>

                    <?php 
                        $reqSearch = $connexionDataBase ->prepare('SELECT * FROM etudiant WHERE nom LIKE :nomEtudiant');

                        $reqSearch -> execute(array(
                            'nomEtudiant'=>  $motCle
                        ));
                    

                        while($resulSearch = $reqSearch -> fetch()){ 

                            ?>
                               <div>
                                    <strong> <?php echo $resulSearch['nom'] ;?> </strong>
                                    <strong> <?php echo $resulSearch['age'] ;?> </strong>
                                    <strong> <?php echo $resulSearch['niveau'] ;?> </strong>
                               </div>

                            <?php 
                            
                        }
                      
                        
                         

                    ?>
                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

                </body>
            </html>

        <?php 
        }
    }
?>