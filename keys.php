<link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

<style type="text/css">
    .bs-example{
    	margin: 20px;
    }
</style>
<p style="font-size:24px;">Administrare chei:</p>
<p></p>
<button class="btn btn-outline-primary" onclick="show_add_key();" id="add_key_btn" style="font-size:20px;"><img src="img/add_key48.png">Adauga cheie</button>
<p></p>
<table class="table table-striped" style="width:580px;">
<thead>
<tr>
<td style="width:460px;"><strong>Denumire cheie</strong></font></a></td>
<td style="width:50px;"><strong>Activa</strong></font></a></td>
<td style="width:60px;"><b>Editare</b></font></td>
</tr>
</thead>
<?php
include_once("config.php");
$qry = mysqli_query($link,"SELECT id,key_name,key_state FROM keys_table WHERE 1=1 ") or die("0");
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
$key_name = $myrow['key_name'];
$activ = $myrow['key_state'];
$i = $i + 1;
if ($i%2 == 1)
{
echo '<tr bgcolor=\'#F5F6F6\' onmouseover="this.style.backgroundColor=\'#EDFAF2\'" onmouseout="this.style.backgroundColor=\'#F5F6F6\'">';
}
else
{
echo '<tr bgcolor=\'#FFFFFF\' onmouseover="this.style.backgroundColor=\'#EDFAF2\'" onmouseout="this.style.backgroundColor=\'#FFFFFF\'">';
}
if (strlen($key_name)>55)
     {echo "<td align=\"left\" valign=\"center\" >".substr(($key_name),0,52)."...</td>\n";}   
else
     {echo "<td align=\"left\" valign=\"center\" >".$key_name."</td>\n";}
if ($activ == '1')
{$flag ='<img src="img/greenflag32.png">';}
else 
{$flag = '<img src="img/cancel32.png">';}
echo "<td>&nbsp;".$flag."</td>\n";
echo '<td align="left" width="100">';
echo "<button type='button' class='btn btn-info' onclick='edit_key(".$id.")' >Edit</button>";
echo '</td>';
} while ($myrow = mysqli_fetch_array($qry));
}
@mysqli_close($dblink);

?>
</tr>
</table>

<p style="font-size:24px;"><?php echo 'Numar de chei:&nbsp;&nbsp;<b>'.$nr_useri.'</b>'; ?></p>