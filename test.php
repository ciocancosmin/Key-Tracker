<link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

<style type="text/css">
    .bs-example{
    	margin: 20px;
    }
</style>
<p></p>
<p>Administrare utilizatori:</p>
<p></p>
<button class="btn btn-info" onclick="show_add_user();" id="add_user_btn">Adauga utilizator</button>
<p></p>
<table class="table table-striped" style="width:600px;">
<thead>
<tr>
<td style="width:150x;"><strong>Utilizator</strong></font></a></td>
<td style="width:250px;"><strong>Nume prenume</strong></font></a></td>
<td style="width:60px;"><strong>Level</strong></font></a></td>
<td style="width:60px;"><strong>Stare</strong></font></a></td>
<td style="width:80px;"><b>Editare</b></font></td>
</tr>
</thead>
<?php
include_once("config.php");
$qry = mysqli_query($link,"SELECT id,username,firstname,lastname,card,level,activ FROM users WHERE username <> 'tech';") or die("0");
if(!$qry)
{
echo "<font color=red>Eroare la conectarea la baza de date\n</font>";
}
$i = 0;
$nr_useri=mysqli_num_rows($qry);
if ($myrow = mysqli_fetch_array($qry))
{
do
{
$id  = $myrow['id'];
$username = $myrow['username'];
$firstname= $myrow['firstname'];
$lastname= $myrow['lastname'];
$level= $myrow['level'];
$activ = $myrow['activ'];
$i = $i + 1;
if ($i%2 == 1)
{
echo '<tr bgcolor=\'#F5F6F6\' onmouseover="this.style.backgroundColor=\'#EDFAF2\'" onmouseout="this.style.backgroundColor=\'#F5F6F6\'">';
}
else
{
echo '<tr bgcolor=\'#FFFFFF\' onmouseover="this.style.backgroundColor=\'#EDFAF2\'" onmouseout="this.style.backgroundColor=\'#FFFFFF\'">';
}
if (strlen($username)>12)
     {echo "<td align=\"left\" valign=\"center\" >".substr(($username),0,13)."...</td>\n";}   
else
     {echo "<td align=\"left\" valign=\"center\" >".$username."</td>\n";}
if (strlen($firstname.$lastname)>25)
     {echo "<td align=\"left\" valign=\"center\" >".substr(($firstname." ".$lastname),0,24)."...</td>\n";}   
else
     {echo "<td align=\"left\" valign=\"center\" >".$firstname." ".$lastname."</td>\n";}
echo "<td>&nbsp;".$level."</td>\n";
echo "<td>&nbsp;".$activ."</td>\n";
echo '<td align="left" width="100">';

echo "<button type='button' class='btn btn-info' onclick='window.location.href = ".'"'."edit_user.php?u=".$id.'"'." ' >Edit</button>";

echo '</td>';
} while ($myrow = mysqli_fetch_array($qry));
}
@mysqli_close($dblink);

?>
</tr>
</table>

<p><?php echo 'Numar de utilizatori:&nbsp;&nbsp;<b>'.$nr_useri.'</b>'; ?></p>

							
