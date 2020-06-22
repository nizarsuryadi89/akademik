<?php 
			@$nilaiakhir 	= (@$row[nPraktik_sms1] + @$row[nProduk_sms1] + @$row[nProyek_sms1])/3;

				//$nBulat 	  = ($nilaiakhir*4)/100;
				$nBulat 	  = round($nilaiakhir,1);

				if (($nilaiakhir >= 88) and ($nilaiakhir <= 100))
				{	
					@$predikat			="A";
					@$deskripsi 			="<b>Sangat Terampil</b> dalam menyelesaikan Proses Praktik, Membuat Produk dan Menyelesaikan Proyek, dari semua KD";
				}else
				if (($nilaiakhir >= 74) and ($nilaiakhir<= 87 ))
				{	@$predikat			="B";
					@$deskripsi 		="<b>Terampil</b> dalam menyelesaikan Proses Praktik, Membuat Produk dan Menyelesaikan Proyek, dari semua KD";
				}else
				if (($nilaiakhir >= 60) and ($nilaiakhir <= 73))
				{	@$predikat			="C";
					@$deskripsi  		= "<b>Kurang Terampil</b> dalam menyelesaikan Proses Praktik, Membuat Produk dan Menyelesaikan Proyek, dari beberapa KD";
				}else
				if (($nilaiakhir < 60) and ($nilaiakhir >= 1))
				{	@$predikat		="D";
					@$deskripsi 	= "<b>Tidak Terampil</b> dalam menyelesaikan Proses Praktik, Membuat Produk dan Menyelesaikan Proyek, dari beberapa KD"; 
				}
				elseif ($nilaiakhir == 0){
					@$predikat		="-";
					$deskripsi = "Nilai Belum Diisi";
				}
?>