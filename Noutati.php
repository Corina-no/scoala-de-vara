<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);


@session_start();
$username=$_SESSION['username'];

require_once "admin/connect.php";
include "Header.html";
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="Noutati.css">
        <title>Noutati</title>
    </head>
    <body>
        <div class="noutati">
<h1 align="center"> Noutati "Scoala de vara"</h1>

<?php
$comanda = isset($_REQUEST['comanda']) ? $_REQUEST['comanda'] : "";
if (!empty($comanda)) {
switch ($comanda){
case 'Log Out':    
        session_destroy();
        unset ($_SESSION['username']);
        header("location: ../ex2/Administrator/login.html");
        break;
case 'add':
$noutate = $_REQUEST["noutate"];

//TODO: Aici trebuie adaugat cod ce valideaza datele.
$sql="INSERT INTO noutati(noutate) VALUES ('$noutate')";
if (!mysqli_query($conexiune, $sql)) {
die('Error: ' . mysqli_error($conexiune));
}
echo "<div class='succes'>Intrare adaugata cu succes</div>";
break;
case 'delete':
$id = $_REQUEST["id"];
//TODO: Aici trebuie adaugat cod ce valideaza datele.
$sql = "DELETE FROM noutati WHERE id=$id";
if (!mysqli_query($conexiune, $sql)) {
die('Error: ' . mysqli_error($conexiune));
}
echo "<div class='succes'>Intrarea cu id-ul $id a fost stearsa cu succes</div>";
break;
case 'edit':
$id = $_REQUEST["id"];
//TODO: Aici trebuie adaugat cod ce valideaza datele.
$sql = "SELECT * FROM noutati WHERE id=$id";
$result = mysqli_query($conexiune, $sql);
if ($row = mysqli_fetch_array($result)) {
$nume = $row['noutate'];

?>
<!-- Forma de editare (begin) -->
<h3>Editare</h3>
<form action="Noutati.php" method="post">
<input name="comanda" type="hidden" value="update" />
<input name="id" type="hidden" value="<?php echo $id;?>" />
Noutate: <input type="text" name="noutate" value="<?php echo $noutate;?>"/>
<input type="submit" value="Update"/>
</form>
<!-- Forma de editare (end) -->
<?php
} else {
echo "<div class='error'>Intrarea cu id-ul $id nu exista!</div>";
}
break;
case 'update':
$id = $_REQUEST["id"];
$noutate = $_REQUEST["noutate"];

//TODO: Aici trebuie adaugat cod ce valideaza datele.
$sql = "UPDATE noutati SET noutate='$noutate' WHERE id=$id";
if (!mysqli_query($conexiune, $sql)) {
die('Error: ' . mysqli_error($conexiune));
//echo "<div class='error'>A aparut o eroare la actualizarea intrarii cu id-ul $id</div>";
} else {
echo "<div class='succes'>Intrarea cu id-ul $id a fost actualizata cu succes!</div>";
}
break;
}
}
?>
<?php
/** Afisarea numerelor din agenda */
if(isset($_SESSION['username'])){
$query = "SELECT * FROM noutati";
$result = mysqli_query($conexiune, $query);
if(mysqli_num_rows($result)) {
  
print("<table border='1' cellspacing='0'>\n");
print("<tr>\n");
print("<th>#</th><th width='800'>Noutate</th><th>Sterge</th>
<th>Edit</th>");
print("</tr>\n");
while($row = mysqli_fetch_array($result)){
print("<tr>\n");
print("<td>" . $row['id']. "</td>\n");
print("<td>" . $row['noutate']. "</td>\n");

print("<td><a href='Noutati.php?comanda=delete&id=" . $row['id']. "'>Delete</a></td>\n");
print("<td><a href='Noutati.php?comanda=edit&id=" . $row['id']. "'>Edit</a></td>\n");
print("</tr>\n");
}
print("</table>");
} else {
print "Nu exista intrari in agenda!";
}
}else{
    print($row['noutate']."\n");

}
if(isset($_SESSION['username'])){
?>
<!-- Forma de adaugare -->
<form action="Noutati.php" method="post">
<input name="comanda" type="hidden" value="add" />
Noutate: <input type="text" name="noutate" />

<input type="submit" value="Adauga"/>

</form>
<form action="Noutati.php" method="post">

<input name="comanda" type="hidden" value="Log Out" />

<input type="submit" name="comanda" value="Log Out">
</form>

<?php
}
?>
      <ul>
      <?php 
$query = "SELECT * FROM noutati";
$result = mysqli_query($conexiune, $query);

    while($row = mysqli_fetch_array($result)){
         
      
      
      print("<p>". $row['noutate']. "</p>"); 
}
?>
</ul>


