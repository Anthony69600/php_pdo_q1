<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>friends list</title>
</head>
<body>


<?php 
    require '_connec.php';
    
    pdo = new \PDO(DSN, USER, PASS);

    if(!empty($_POST)){
      $errors=[];
    } else {

        $lastname = trim($_POST['lastname']); // get the data from a form
        $firstname = trim($_POST['firstname']); // get the data from a form
        
        
        $query = 'INSERT INTO friend (lastname,firstname) VALUES(:lastname, :firstname)';
        
        
        $statement = $pdo->prepare($query);
        
        $statement->bindValue(':lastname', $lastname, \PDO::PARAM_STR);
        
        $statement->bindValue(':firstname', $firstname, \PDO::PARAM_STR);
                
        $statement->execute();
        
        header('Location: ');
        
      }
    
    

    $query = "SELECT * FROM friend";
    $statement = $pdo->query($query);
    $friends = $statement->fetchAll(\PDO::FETCH_ASSOC); 


?>

<h1>friends list</h1>

<?php

    foreach($friends as $friend) {
      echo '<br>';
      echo $friend['firstname'] . ' ' . $friend['lastname'];
      echo '<br>';
    }

?>
<br><br>
<form  action=""  method="post">

<div>

  <label  for="firstname">First name :</label>

  <input  type="text"  id="firstname" placeholder="firstname" name="firstname">

</div>

<div>

  <label  for="lastname">Last name :</label>

    <input  type="text"  id="lastname" placeholder="lastname" name="lastname">

</div>

<div  class="button">

  <button  type="submit">Add friend</button>

</div>

</form>
    


</body>
</html>
