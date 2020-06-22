<?php
	//include "../../configakademik.php";
	
	if($_REQUEST['nilai_id'])
	 {
	 	$id = $_POST['nilai_id'];
	 		$sql = $con->query("select * from tbl_nilaipengetahuan where nilai_id= $id");
	 		$r 	 = $sql->fetch_assoc();

?>
<form action="" method='POST'>
	<div class="form-group">
		<div style="width:100%; background-color:#28b2bc; color:#FFFFFF; padding:10px; margin-top:10px; font-size:22px">Edit Nilai</div>
		<label class="control-label" for="namasiswa">Nama Siswa</label>
		<input type="text" name="namasiswa" class="form-control" id="namasiswa" >
	</div>
</form>

<?php
	}
?>