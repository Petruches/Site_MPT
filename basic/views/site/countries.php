
<table border="1">
     <tr>
	  <td width=25px>Код</td>
	  <td width=150px>Название</td>
	  <td width=100px>Популяция</td>
	 </tr>
      <?php foreach ($countries as $country):?>
	 <tr>
	  <td width=25px><?= $country->code; ?></td> 
	  <td width=150px>><?= $country->name; ?></td>
	  <td width=100px>>><?= $country->population; ?></td>
	 </tr>
      <?php endforeach; ?>
</table>
