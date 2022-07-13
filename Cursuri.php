<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);


@session_start();
$username=$_SESSION['username'];

require_once "admin/connect.php";
include "Header.html";
?>
<head>
        <link rel="stylesheet" href="Cursuri.css">
</head>
<body>
<div class="cursuri">
<h1 align="center"> Cursuri incluse in programul „Scoala de Vara”</h1>

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
$denumire = $_REQUEST["denumire"];
$descriere = $_REQUEST["descriere"];
//TODO: Aici trebuie adaugat cod ce valideaza datele.
$sql="INSERT INTO cursuri(denumire, descriere) VALUES ('$denumire','$descriere')";
if (!mysqli_query($conexiune, $sql)) {
die('Error: ' . mysqli_error($conexiune));
}
echo "<div class='succes'>Intrare adaugata cu succes</div>";
break;
case 'delete':
$id = $_REQUEST["id"];
$sql = "DELETE FROM cursuri WHERE id=$id";
if (!mysqli_query($conexiune, $sql)) {
die('Error: ' . mysqli_error($conexiune));
}
echo "<div class='succes'>Intrarea cu id-ul $id a fost stearsa cu succes</div>";
break;
case 'edit':
$id = $_REQUEST["id"];
$sql = "SELECT * FROM cursuri WHERE id=$id";
$result = mysqli_query($conexiune, $sql);
if ($row = mysqli_fetch_array($result)) {
$nume = $row['denumire'];
$numar = $row['descriere'];
?>
<!-- Forma de editare (begin) -->
<h3>Editare</h3>
<form action="Cursuri.php" method="post">
<input name="comanda" type="hidden" value="update" />
<input name="id" type="hidden" value="<?php echo $id;?>" />
Denumire: <input type="text" name="denumire" value="<?php echo $denumire;?>"/>
Descriere: <input type="text" name="descriere" value="<?php echo $descriere;?>"/>
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
$denumire = $_REQUEST["denumire"];
$descriere = $_REQUEST["descriere"];
//TODO: Aici trebuie adaugat cod ce valideaza datele.
$sql = "UPDATE cursuri SET denumire='$denumire', descriere='$descriere' WHERE id=$id";
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
$query = "SELECT * FROM cursuri";
$result = mysqli_query($conexiune, $query);
if(mysqli_num_rows($result)) {
  
print("<table border='1' cellspacing='0'>\n");
print("<tr>\n");
print("<th>#</th><th width='100'>Denumire</th><th width='800'>Descriere</th><th>Sterge</th>
<th>Edit</th>");
print("</tr>\n");
while($row = mysqli_fetch_array($result)){
print("<tr>\n");
print("<td>" . $row['id']. "</td>\n");
print("<td>" . $row['denumire']. "</td>\n");
print("<td>" . $row['descriere']. "</td>\n");
print("<td><a href='Cursuri.php?comanda=delete&id=" . $row['id']. "'>Delete</a></td>\n");
print("<td><a href='Cursuri.php?comanda=edit&id=" . $row['id']. "'>Edit</a></td>\n");
print("</tr>\n");
}
print("</table>");
} else {
print "Nu exista intrari in agenda!";
}
}else{
    print($row['denumire']."\n");
    print($row['descriere']);
}
if(isset($_SESSION['username'])){
?>
<!-- Forma de adaugare -->
<form action="Cursuri.php" method="post">
<input name="comanda" type="hidden" value="add" />
Denumire: <input type="text" name="denumire" />
Descriere: <input type="text" name="descriere" />

<input type="submit" value="Adauga"/>

</form>
<form action="Cursuri.php" method="post">

<input name="comanda" type="hidden" value="Log Out" />

<input type="submit" name="comanda" value="Log Out">
</form>

<?php
}
?>
      <ul>
      <?php 
$query = "SELECT * FROM cursuri";
$result = mysqli_query($conexiune, $query);

    while($row = mysqli_fetch_array($result)){
         
      
      print("<li><h4>". $row['denumire']. "</h4></li>");
      print("<p>". $row['descriere']. "</p>"); 
}
?>
</ul>
</body>


