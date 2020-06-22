<?php
	if ($semester == '1')
	{
		$query		="select * from tbl_transkrip_sms1 a 
						inner join tbl_siswa b on a.siswa_nis=b.siswa_nis
							inner join tbl_mapel c on a.mapel_id=c.mapel_id
								inner join tbl_mapelrombel d on c.mapel_id=d.mapel_id
									inner join tbl_guru e on a.guru_sms1=e.guru_id 
										
											where a.mapel_id=$kode and a.rombel_id=$rombel";
		
		$tampil		="select * from tbl_transkrip_sms1 a
							inner join tbl_siswa b on a.siswa_nis=b.siswa_nis 
								inner join tbl_rombel c on a.rombel_id = c.rombel_id 
					where a.mapel_id = $kode and a.rombel_id= $rombel order by a.siswa_nis asc";	
	}else
	if ($semester == '2')
	{

		$query		="select * from tbl_transkrip_sms2 a 
						inner join tbl_siswa b on a.siswa_nis=b.siswa_nis
							inner join tbl_mapel c on a.mapel_id=c.mapel_id
								inner join tbl_mapelrombel d on c.mapel_id=d.mapel_id
									inner join tbl_guru e on a.guru_sms1=e.guru_id 
										
											where a.mapel_id=$kode and a.rombel_id=$rombel";
		
		//echo "$query";
		$tampil		="select * from tbl_transkrip_sms2 a
							inner join tbl_siswa b on a.siswa_nis=b.siswa_nis 
								inner join tbl_rombel c on a.rombel_id = c.rombel_id 
					where a.mapel_id = $kode and a.rombel_id= $rombel order by a.siswa_nis asc";
	}
	else
	if ($semester == '3')
	{
		$query		="select * from tbl_transkrip_sms3 a 
						inner join tbl_siswa b on a.siswa_nis=b.siswa_nis
							inner join tbl_mapel c on a.mapel_id=c.mapel_id
								inner join tbl_mapelrombel d on c.mapel_id=d.mapel_id
									left join tbl_guru e on a.guru_sms1=e.guru_id 
										
											where a.mapel_id=$kode and a.rombel_id=$rombel";
		
		$tampil		="select * from tbl_transkrip_sms3 a
							inner join tbl_siswa b on a.siswa_nis=b.siswa_nis 
								inner join tbl_rombel c on a.rombel_id = c.rombel_id 
					where a.mapel_id = $kode and a.rombel_id= $rombel order by a.siswa_nis asc";
	}
	else
	if ($semester == '4')
	{
		$query		="select * from tbl_transkrip_sms4 a 
						inner join tbl_siswa b on a.siswa_nis=b.siswa_nis
							inner join tbl_mapel c on a.mapel_id=c.mapel_id
								inner join tbl_mapelrombel d on c.mapel_id=d.mapel_id
									inner join tbl_guru e on a.guru_sms1=e.guru_id 
										
											where a.mapel_id=$kode and a.rombel_id=$rombel";
		
		$tampil		="select * from tbl_transkrip_sms4 a
							inner join tbl_siswa b on a.siswa_nis=b.siswa_nis 
								inner join tbl_rombel c on a.rombel_id = c.rombel_id 
					where a.mapel_id = $kode and a.rombel_id= $rombel order by a.siswa_nis asc";
	}
	else
	if ($semester == '5')
	{
		$query		="select * from tbl_transkrip_sms5 a 
						inner join tbl_siswa b on a.siswa_nis=b.siswa_nis
							inner join tbl_mapel c on a.mapel_id=c.mapel_id
								inner join tbl_mapelrombel d on c.mapel_id=d.mapel_id
									inner join tbl_guru e on a.guru_sms1=e.guru_id 
										
											where a.mapel_id=$kode and a.rombel_id=$rombel";
		
		
		$tampil		="select * from tbl_transkrip_sms5 a
							inner join tbl_siswa b on a.siswa_nis=b.siswa_nis 
								inner join tbl_rombel c on a.rombel_id = c.rombel_id 
					where a.mapel_id = $kode and a.rombel_id= $rombel order by a.siswa_nis asc";
	}
	else
	if ($semester == '6')
	{
		$query		="select * from tbl_transkrip_sms6 a 
						inner join tbl_siswa b on a.siswa_nis=b.siswa_nis
							inner join tbl_mapel c on a.mapel_id=c.mapel_id
								inner join tbl_mapelrombel d on c.mapel_id=d.mapel_id
									inner join tbl_guru e on a.guru_sms1=e.guru_id 
										
											where a.mapel_id=$kode and a.rombel_id=$rombel";
		
		$tampil		="select * from tbl_transkrip_sms6 a
							inner join tbl_siswa b on a.siswa_nis=b.siswa_nis 
								inner join tbl_rombel c on a.rombel_id = c.rombel_id 
					where a.mapel_id = $kode and a.rombel_id= $rombel order by a.siswa_nis asc";
	}
?>