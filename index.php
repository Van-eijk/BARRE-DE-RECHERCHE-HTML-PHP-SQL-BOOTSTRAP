<?php include "config.php" ;?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
   <div class="container">
    <div class="search-box">
        <form action="resultsearchtest.php" method="POST">
            <input type="text" placeholder="Rechercher" name="motCle">
            <input type="submit" value="rechercher" name="search">
        </form>
    </div>




   
       



   </div>


   <?php 
                    
                        $reqSearch = $connexionDataBase ->query('SELECT * FROM etudiant');

                        

                    ?>

                    <div class="result-search">

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
                                        <td>
                                            <span>Delete</span>
                                            <span>update</span>
                                        </td>
                                        

                                    </tr>
                                
                                
                                <?php 
                    
                                    }
                    

                                ?>
                            

                            </tbody>
                        </table>

                    </div>






   
   
   
   <!-- Bootstrap JS bundle →

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>