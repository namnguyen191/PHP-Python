
<HTML>
<HEAD>
<TITLE></TITLE>
</HEAD>
<BODY>
<?php
$myFile = fopen("myPhoneBook","r") or die("Unable to open file!");
while(!feof($myFile))
    echo fgets($myFile)."<br>";
fclose($myFile);
?>
<form method="POST">
    <label for="phone">Phone no:</label>
    <input type="number" id="phone" name="phone">
    <br>
    <input type="submit" value="Submit">
</form>
<?php
if(isset($_POST["phone"])){
$myFile = fopen("myPhoneBook","a") or die("Unable to open file!");
$myData = $_POST["phone"];
fwrite($myFile,$myData."\n" );
fclose($myFile);
    header("Refresh:0");
}
?>
</BODY>
</HTML>