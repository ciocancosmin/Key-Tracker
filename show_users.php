<link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

<style type="text/css">
    .bs-example{
    	margin: 20px;
    }
</style>
<p style="font-size:24px;">Administrare utilizatori:</p>
<p></p>
<button class="btn btn-outline-primary" onclick="show_add_user();" id="add_user_btn" style="font-size:20px;"><img src="img/add_user48.png">Adauga utilizator</button>
<p></p>
<table class="table table-striped" style="width:580px;">
<thead>
<tr>
<td style="width:130x;"><strong>Utilizator</strong></font></a></td>
<td style="width:180px;"><strong>Nume prenume</strong></font></a></td>
<td style="width:50px;"><strong>Nivel</strong></font></a></td>
<td style="width:50px;"><strong>Stare</strong></font></a></td>
<td style="width:60px;"><b>Editare</b></font></td>
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
if (strlen($firstname.$lastname)>22)
     {echo "<td align=\"left\" valign=\"center\" >".substr(($firstname." ".$lastname),0,21)."...</td>\n";}   
else
     {echo "<td align=\"left\" valign=\"center\" >".$firstname." ".$lastname."</td>\n";}
echo "<td>&nbsp;".$level."</td>\n";
if ($activ == '1')
{$flag ='<img src="img/greenflag32.png">';}
else 
{$flag = '<img src="img/cancel32.png">';}
echo "<td>&nbsp;".$flag."</td>\n";
echo '<td align="left" width="100">';

echo "<button type='button' class='btn btn-info' onclick='load_user(".$id.")' >Edit</button>";

echo '</td>';
} while ($myrow = mysqli_fetch_array($qry));
}
@mysqli_close($dblink);

?>
</tr>
</table>

<p style="font-size:24px;"><?php echo 'Numar de utilizatori:&nbsp;&nbsp;<b>'.$nr_useri.'</b>'; ?></p>