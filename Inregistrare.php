<?php 
error_reporting(E_ERROR | E_WARNING | E_PARSE);

    
    @session_start();
    $username=$_SESSION['username'];
    
    require_once "admin/connect.php";
    include "Header.html";
   
  
    

        $comanda = isset($_REQUEST['comanda']) ? $_REQUEST['comanda'] : "";
        if (!empty($comanda)) {
            switch($comanda){
              case 'Log Out':
                session_destroy();
                unset ($_SESSION['username']);
                header("location: ../ex2/Administrator/login.html");
                break;
              case 'Inregistrare': 
                if(isset($_REQUEST["check"])){

                    foreach($_REQUEST["check"] as $sex1){
                    
                    $sex= $sex1;

                    }
                }
                
                
                $cursuri='';
                if(isset($_REQUEST["curs"])){
                foreach($_REQUEST['curs'] as $curs){
                    $cursuri .= $curs. ' ';
                }
                }

            
                   
                 $nume = $_REQUEST["nume"];
                 $prenume = $_REQUEST["prenume"];
                 $cnp = $_REQUEST["cnp"];
                 $varsta = $_REQUEST["varsta"];
                 

                 $sql="INSERT INTO inregistrare(nume, prenume, cnp, varsta, sex, cursuri) VALUES ('$nume','$prenume', '$cnp', '$varsta', '$sex', '$cursuri')";
                 if (!mysqli_query($conexiune, $sql)) {
                   die('Error: ' . mysqli_error($conexiune));
                }
                echo "<script>alert('Inregistrare efectuata!Multumim!');</script>";
                break;
            } 
            }

    if(isset($_SESSION['username'])){
    ?>
    <div class="inregistrare">
    <form action="Inregistrare.php" method="post">     
    <input name="comanda" type="hidden" value="Log Out" />
    <input type="submit" name="comanda" value="Log Out">
    </form>
    <?php        
    $query = "SELECT * FROM inregistrare";
    $result = mysqli_query($conexiune, $query);
    if(mysqli_num_rows($result)) {
  
    print("<table border='1' cellspacing='0'>\n");
    print("<tr>\n");
    print("<th width='100'>Nume</th><th width='100'>Prenume</th><th width='100'>CNP</th><th width='100'>Varsta</th><th width='100'>Sex</th><th width='100'>Cursuri</th>");
    print("</tr>\n");
    while($row = mysqli_fetch_array($result)){
    print("<tr>\n");
    print("<td>" . $row['nume']. "</td>\n");
    print("<td>" . $row['prenume']. "</td>\n");
    print("<td>" . $row['cnp']. "</td>\n");
    print("<td>" . $row['varsta']. "</td>\n");
    print("<td>" . $row['sex']. "</td>\n");
    print("<td>" . $row['cursuri']. "</td>\n");

    print("</tr>\n");
}
print("</table>");
} else {
print "Nu exista intrari in agenda!";
}

}

include "Inregistrare.html";

                
?>
</div>