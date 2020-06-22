<?php
if (
	(@$row[nSjujur_sms1] == '1') and (@$row[nSdisiplin_sms1] == '1') and (@$row[nStanggungjawab_sms1] == '1') and (@$row[nStoleransi_sms1] == '1') and (@$row[nSgotongroyong_sms1] == '1') and (@$row[nSpercayadiri_sms1] == '1') and (@$row[nSsopansantun_sms1]=='1')
	)
	{	
		@$predikat 			="A";
		@$deskripsi 		="<b>Selalu</b> Jujur, Disiplin, Tanggung Jawab, Toleransi, Gotong Royong, Percaya diri dan Sopan Santun <b>(Sudah Baik Pada Semua Aspek)</b>";
	}
	elseif 
	(
	(@$row[nSjujur_sms1] == '1') and (@$row[nSdisiplin_sms1] == '1') and (@$row[nStanggungjawab_sms1] == '1') and (@$row[nStoleransi_sms1] == '1') and (@$row[nSgotongroyong_sms1] == '1') and (@$row[nSpercayadiri_sms1] == '1') and (@$row[nSsopansantun_sms1]=='0')
	)
	{	
		@$predikat 			="A-";
		@$deskripsi 		="<b>Selalu</b> Jujur, Disiplin, Tanggung Jawab, Toleransi, Gotong Royong, Percaya diri tetapi <b>Perlu Perbaikan Pada Aspek</b> Sopan Santun ";
	}
	elseif 
		(
	(@$row[nSjujur_sms1] == '1') and (@$row[nSdisiplin_sms1] == '1') and (@$row[nStanggungjawab_sms1] == '1') and (@$row[nStoleransi_sms1] == '1') and (@$row[nSgotongroyong_sms1] == '1') and (@$row[nSpercayadiri_sms1] == '0') and (@$row[nSsopansantun_sms1]=='1')
	)
	{	
		@$predikat 			="A-";
		@$deskripsi 		="<b>Selalu</b> Jujur, Disiplin, Tanggung Jawab, Toleransi, Gotong Royong, dan Sopan Santun, tetapi Perlu Perbaikan Pada Aspek Kepercayaan Diri <b></b>";
	}
	elseif 
		(
	(@$row[nSjujur_sms1] == '1') and (@$row[nSdisiplin_sms1] == '1') and (@$row[nStanggungjawab_sms1] == '1') and (@$row[nStoleransi_sms1] == '1') and (@$row[nSgotongroyong_sms1] == '0') and (@$row[nSpercayadiri_sms1] == '1') and (@$row[nSsopansantun_sms1]=='1')
	)
	{	
		@$predikat 			="A-";
		@$deskripsi 		="<b>Selalu</b> Jujur, Disiplin, Tanggung Jawab, Toleransi,Percaya Diri  , dan Sopan Santun, tetapi Perlu Perbaikan Pada Aspek Gotong Royong<b></b>";
	}
	elseif 
		(
	(@$row[nSjujur_sms1] == '1') and (@$row[nSdisiplin_sms1] == '1') and (@$row[nStanggungjawab_sms1] == '1') and (@$row[nStoleransi_sms1] == '0') and (@$row[nSgotongroyong_sms1] == '1') and (@$row[nSpercayadiri_sms1] == '1') and (@$row[nSsopansantun_sms1]=='1')
	)
	{	
		@$predikat 			="A-";
		@$deskripsi 		="<b>Selalu</b> Jujur, Disiplin, Tanggung Jawab, Gotong Royong,Percaya Diri  , dan Sopan Santun, tetapi Perlu Perbaikan Pada Aspek Toleransi<b></b>";
	}
	elseif 
		(
	(@$row[nSjujur_sms1] == '1') and (@$row[nSdisiplin_sms1] == '1') and (@$row[nStanggungjawab_sms1] == '0') and (@$row[nStoleransi_sms1] == '1') and (@$row[nSgotongroyong_sms1] == '1') and (@$row[nSpercayadiri_sms1] == '1') and (@$row[nSsopansantun_sms1]=='1')
	)
	{	
		@$predikat 			="A-";
		@$deskripsi 		="<b>Selalu</b> Jujur, Disiplin,  Toleransi, Gotong Royong,Kepercayaan Diri  , dan Sopan Santun, tetapi Perlu Perbaikan Pada Aspek Tanggung Jawab<b></b>";
	}
	elseif 
		(
	(@$row[nSjujur_sms1] == '1') and (@$row[nSdisiplin_sms1] == '0') and (@$row[nStanggungjawab_sms1] == '1') and (@$row[nStoleransi_sms1] == '1') and (@$row[nSgotongroyong_sms1] == '1') and (@$row[nSpercayadiri_sms1] == '1') and (@$row[nSsopansantun_sms1]=='1')
	)
	{	
		@$predikat 			="A-";
		@$deskripsi 		="<b>Selalu</b> Jujur, Tanggung Jawab,  Toleransi, Gotong Royong,Kepercayaan Diri  , dan Sopan Santun, tetapi Perlu Perbaikan Pada Aspek <b>Kedisiplinan</b>";
	}
	elseif 
		(
	(@$row[nSjujur_sms1] == '0') and (@$row[nSdisiplin_sms1] == '1') and (@$row[nStanggungjawab_sms1] == '1') and (@$row[nStoleransi_sms1] == '1') and (@$row[nSgotongroyong_sms1] == '1') and (@$row[nSpercayadiri_sms1] == '1') and (@$row[nSsopansantun_sms1]=='1')
	)
	{	
		@$predikat 			="A-";
		@$deskripsi 		="<b>Selalu</b> Disiplin, Tanggung Jawab,  Toleransi, Gotong Royong,Kepercayaan Diri  , dan Sopan Santun, tetapi Perlu Perbaikan Pada Aspek <b>Kejujuran</b>";
	}
	elseif 
		(
	(@$row[nSjujur_sms1] == '0') and (@$row[nSdisiplin_sms1] == '0') and (@$row[nStanggungjawab_sms1] == '1') and (@$row[nStoleransi_sms1] == '1') and (@$row[nSgotongroyong_sms1] == '1') and (@$row[nSpercayadiri_sms1] == '1') and (@$row[nSsopansantun_sms1]=='1')
	)
	{	
		@$predikat 			="B+";
		@$deskripsi 		="<b>Selalu</b>Tanggung Jawab,  Toleransi, Gotong Royong,Percaya Diri  , dan Sopan Santun, tetapi Perlu Perbaikan Pada Aspek <b>Kejujuran dan Kedisiplinan</b>";
	}
	elseif 
		(
	(@$row[nSjujur_sms1] == '0') and (@$row[nSdisiplin_sms1] == '1') and (@$row[nStanggungjawab_sms1] == '0') and (@$row[nStoleransi_sms1] == '1') and (@$row[nSgotongroyong_sms1] == '1') and (@$row[nSpercayadiri_sms1] == '1') and (@$row[nSsopansantun_sms1]=='1')
	)
	{	
		@$predikat 			="B+";
		@$deskripsi 		="<b>Selalu</b>Disiplin,  Toleransi, Gotong Royong,Percaya Diri  , dan Sopan Santun, tetapi Perlu Perbaikan Pada Aspek <b>Kejujuran dan Tanggung Jawab </b>";
	}
	elseif 
		(
	(@$row[nSjujur_sms1] == '0') and (@$row[nSdisiplin_sms1] == '1') and (@$row[nStanggungjawab_sms1] == '1') and (@$row[nStoleransi_sms1] == '0') and (@$row[nSgotongroyong_sms1] == '1') and (@$row[nSpercayadiri_sms1] == '1') and (@$row[nSsopansantun_sms1]=='1')
	)
	{	
		@$predikat 			="B+";
		@$deskripsi 		="<b>Selalu</b> Disiplin, Gotong Royong,Percaya Diri,Tanggung Jawab  , dan Sopan Santun, tetapi Perlu Perbaikan Pada Aspek <b>Kejujuran dan Rasa Toleransi </b>";
	}
	elseif 
		(
	(@$row[nSjujur_sms1] == '0') and (@$row[nSdisiplin_sms1] == '1') and (@$row[nStanggungjawab_sms1] == '1') and (@$row[nStoleransi_sms1] == '1') and (@$row[nSgotongroyong_sms1] == '0') and (@$row[nSpercayadiri_sms1] == '1') and (@$row[nSsopansantun_sms1]=='1')
	)
	{	
		@$predikat 			="B+";
		@$deskripsi 		="<b>Selalu</b> Disiplin, Toleransi ,Percaya Diri,Tanggung Jawab  , dan Sopan Santun, tetapi Perlu Perbaikan Pada Aspek <b>Kejujuran dan Gotong Royong </b>";
	}
	elseif 
		(
	(@$row[nSjujur_sms1] == '0') and (@$row[nSdisiplin_sms1] == '1') and (@$row[nStanggungjawab_sms1] == '1') and (@$row[nStoleransi_sms1] == '1') and (@$row[nSgotongroyong_sms1] == '1') and (@$row[nSpercayadiri_sms1] == '0') and (@$row[nSsopansantun_sms1]=='1')
	)
	{	
		@$predikat 			="B+";
		@$deskripsi 		="<b>Selalu</b> Disiplin, Toleransi ,Percaya Diri ,Gotong Royong, dan Sopan Santun, Tanggung Jawab, tetapi Perlu Perbaikan Pada Aspek <b>Kejujuran dan Kepercayaan Diri yang Masih Kurang</b>";
	}
	elseif 
		(
	(@$row[nSjujur_sms1] == '0') and (@$row[nSdisiplin_sms1] == '1') and (@$row[nStanggungjawab_sms1] == '1') and (@$row[nStoleransi_sms1] == '1') and (@$row[nSgotongroyong_sms1] == '1') and (@$row[nSpercayadiri_sms1] == '1') and (@$row[nSsopansantun_sms1]=='0')
	)
	{	
		@$predikat 			="B+";
		@$deskripsi 		="<b>Selalu</b> Disiplin,Percaya Diri,  Toleransi ,Percaya Diri ,Gotong Royong, Tanggung Jawab, tetapi Perlu Perbaikan Pada Aspek <b>Kejujuran dan Sopan Santun Terhadap Orang Yang Lebih tua yang masih kurang</b>";
	}
	elseif 
		(
	(@$row[nSjujur_sms1] == '1') and (@$row[nSdisiplin_sms1] == '0') and (@$row[nStanggungjawab_sms1] == '1') and (@$row[nStoleransi_sms1] == '1') and (@$row[nSgotongroyong_sms1] == '1') and (@$row[nSpercayadiri_sms1] == '1') and (@$row[nSsopansantun_sms1]=='0')
	)
	{	
		@$predikat 			="B+";
		@$deskripsi 		="<b>Selalu</b> Jujur ,Percaya Diri, Tanggung Jawab, Toleransi ,Percaya Diri ,Gotong Royong, tetapi Perlu Perbaikan Pada Aspek <b>Kedisiplinan dan Sopan Santun Terhadap Orang Yang Lebih tua yang masih kurang</b>";
	}
	elseif 
		(
	(@$row[nSjujur_sms1] == '1') and (@$row[nSdisiplin_sms1] == '0') and (@$row[nStanggungjawab_sms1] == '1') and (@$row[nStoleransi_sms1] == '1') and (@$row[nSgotongroyong_sms1] == '1') and (@$row[nSpercayadiri_sms1] == '0') and (@$row[nSsopansantun_sms1]=='1')
	)
	{	
		@$predikat 			="B+";
		@$deskripsi 		="<b>Selalu</b> Jujur ,Percaya Diri, sopan santun, Tanggung Jawab, Toleransi ,Percaya Diri ,Gotong Royong, tetapi Perlu Perbaikan Pada Aspek <b>Kedisiplinan dan Kepercayaan diri yang masih kurang</b>";
	}
	elseif 
		(
	(@$row[nSjujur_sms1] == '1') and (@$row[nSdisiplin_sms1] == '0') and (@$row[nStanggungjawab_sms1] == '1') and (@$row[nStoleransi_sms1] == '1') and (@$row[nSgotongroyong_sms1] == '0') and (@$row[nSpercayadiri_sms1] == '1') and (@$row[nSsopansantun_sms1]=='1')
	)
	{	
		@$predikat 			="B+";
		@$deskripsi 		="<b>Selalu</b> Jujur ,Percaya Diri, sopan santun,Tanggung Jawab,  Toleransi ,Percaya Diri , tetapi Perlu Perbaikan Pada Aspek <b>Kedisiplinan dan Kurang Peka Terhadap Proses Gotong Royong</b>";
	}
	elseif 
		(
	(@$row[nSjujur_sms1] == '1') and (@$row[nSdisiplin_sms1] == '0') and (@$row[nStanggungjawab_sms1] == '1') and (@$row[nStoleransi_sms1] == '0') and (@$row[nSgotongroyong_sms1] == '1') and (@$row[nSpercayadiri_sms1] == '1') and (@$row[nSsopansantun_sms1]=='1')
	)
	{	
		@$predikat 			="B+";
		@$deskripsi 		="<b>Selalu</b> Jujur ,Percaya Diri,Tanggung Jawab, sopan santun ,Percaya Diri ,Gotong Royong, tetapi Perlu Perbaikan Pada Aspek <b>Kedisiplinan dan Kurang Toleransi </b>";
	}
	elseif 
		(
	(@$row[nSjujur_sms1] == '1') and (@$row[nSdisiplin_sms1] == '0') and (@$row[nStanggungjawab_sms1] == '0') and (@$row[nStoleransi_sms1] == '1') and (@$row[nSgotongroyong_sms1] == '1') and (@$row[nSpercayadiri_sms1] == '1') and (@$row[nSsopansantun_sms1]=='1')
	)
	{	
		@$predikat 			="B+";
		@$deskripsi 		="<b>Selalu</b> Jujur ,Percaya Diri, sopan santun ,Percaya Diri ,Gotong Royong, Toleransi, tetapi Perlu Perbaikan Pada Aspek <b>Kedisiplinan dan Kurang Bertanggung Jawab </b>";
	}
	elseif
		(
	(@$row[nSjujur_sms1] == '1') and (@$row[nSdisiplin_sms1] == '1') and (@$row[nStanggungjawab_sms1] == '1') and (@$row[nStoleransi_sms1] == '1') and (@$row[nSgotongroyong_sms1] == '1') and (@$row[nSpercayadiri_sms1] == '0') and (@$row[nSsopansantun_sms1]=='0'))
	
	{	
		@$predikat 			="B+";
		@$deskripsi 		="<b>Selalu</b> Jujur ,Disiplin, Gotong Royong, Toleransi, tetapi Perlu Perbaikan Pada Aspek <b>SOpan Santun dan Kurangnya Kepercayaan Diri </b>";
	}
	elseif
	(
	(@$row[nSjujur_sms1] == '1') and (@$row[nSdisiplin_sms1] == '1') and (@$row[nStanggungjawab_sms1] == '0') and (@$row[nStoleransi_sms1] == '1') and (@$row[nSgotongroyong_sms1] == '1') and (@$row[nSpercayadiri_sms1] == '0') and (@$row[nSsopansantun_sms1]=='1'))
	
	{	
		@$predikat 			="B+";
		@$deskripsi 		="<b>Selalu</b> Jujur ,Disiplin, Toleransi ,Gotong Royong, Toleransi, tetapi Perlu Perbaikan Pada Aspek <b>Kurangnya bertanggung Jawab dan Kurangnya Kepercayaan Diri </b>";
	}
	elseif
	(
	(@$row[nSjujur_sms1] == '0') and (@$row[nSdisiplin_sms1] == '0') and (@$row[nStanggungjawab_sms1] == '0') and (@$row[nStoleransi_sms1] == '0') and (@$row[nSgotongroyong_sms1] == '0') and (@$row[nSpercayadiri_sms1] == '0') and (@$row[nSsopansantun_sms1]=='0'))
	
	{	
		@$predikat 			="E";
		@$deskripsi 		="Perlu Perbaikan Pada Semua Aspek";
	}
	elseif
	(
	(@$row[nSjujur_sms1] == '1') and (@$row[nSdisiplin_sms1] == '0') and (@$row[nStanggungjawab_sms1] == '0') and (@$row[nStoleransi_sms1] == '0') and (@$row[nSgotongroyong_sms1] == '0') and (@$row[nSpercayadiri_sms1] == '0') and (@$row[nSsopansantun_sms1]=='0'))
	
	{	
		@$predikat 			="D-";
		@$deskripsi 		="Selalu Jujur, Tetapi Perlu Perbaikan Pada Semua Sebagian Besar Aspek Sikap";
	}
	elseif
	(
	(@$row[nSjujur_sms1] == '0') and (@$row[nSdisiplin_sms1] == '0') and (@$row[nStanggungjawab_sms1] == '0') and (@$row[nStoleransi_sms1] == '1') and (@$row[nSgotongroyong_sms1] == '0') and (@$row[nSpercayadiri_sms1] == '0') and (@$row[nSsopansantun_sms1]=='0'))
	
	{	
		@$predikat 			="D-";
		@$deskripsi 		="Selalu Toleransi, Tetapi Perlu Perbaikan Pada Semua Sebagian Besar Aspek Sikap";
	}
	elseif
	(
	(@$row[nSjujur_sms1] == '0') and (@$row[nSdisiplin_sms1] == '1') and (@$row[nStanggungjawab_sms1] == '0') and (@$row[nStoleransi_sms1] == '0') and (@$row[nSgotongroyong_sms1] == '0') and (@$row[nSpercayadiri_sms1] == '0') and (@$row[nSsopansantun_sms1]=='0'))
	
	{	
		@$predikat 			="D-";
		@$deskripsi 		="Selalu Disiplin, Tetapi Perlu Perbaikan Pada Semua Sebagian Besar Aspek Sikap";
	}
	elseif
	(
	(@$row[nSjujur_sms1] == '0') and (@$row[nSdisiplin_sms1] == '0') and (@$row[nStanggungjawab_sms1] == '1') and (@$row[nStoleransi_sms1] == '0') and (@$row[nSgotongroyong_sms1] == '0') and (@$row[nSpercayadiri_sms1] == '0') and (@$row[nSsopansantun_sms1]=='0'))
	
	{	
		@$predikat 			="D-";
		@$deskripsi 		="Selalu Tanggung Jawab, Tetapi Perlu Perbaikan Pada Semua Sebagian Besar Aspek Sikap";
	}
	elseif
	(
	(@$row[nSjujur_sms1] == '0') and (@$row[nSdisiplin_sms1] == '0') and (@$row[nStanggungjawab_sms1] == '0') and (@$row[nStoleransi_sms1] == '0') and (@$row[nSgotongroyong_sms1] == '0') and (@$row[nSpercayadiri_sms1] == '1') and (@$row[nSsopansantun_sms1]=='0'))
	
	{	
		@$predikat 			="D-";
		@$deskripsi 		="Selalu Percaya Diri, Tetapi Perlu Perbaikan Pada Semua Sebagian Besar Aspek Sikap";
	}
	elseif
	(
	(@$row[nSjujur_sms1] == '0') and (@$row[nSdisiplin_sms1] == '0') and (@$row[nStanggungjawab_sms1] == '0') and (@$row[nStoleransi_sms1] == '0') and (@$row[nSgotongroyong_sms1] == '1') and (@$row[nSpercayadiri_sms1] == '0') and (@$row[nSsopansantun_sms1]=='0'))
	
	{	
		@$predikat 			="D-";
		@$deskripsi 		="Selalu Gotong Royong, Tetapi Perlu Perbaikan Pada Semua Sebagian Besar Aspek Sikap";
	}
	elseif
	(
	(@$row[nSjujur_sms1] == '1') and (@$row[nSdisiplin_sms1] == '0') and (@$row[nStanggungjawab_sms1] == '0') and (@$row[nStoleransi_sms1] == '1') and (@$row[nSgotongroyong_sms1] == '0') and (@$row[nSpercayadiri_sms1] == '0') and (@$row[nSsopansantun_sms1]=='0'))
	
	{	
		@$predikat 			="D";
		@$deskripsi 		="Selalu Jujur dan Toleransi, Tetapi Perlu Perbaikan Pada Sebagian Besar Aspek Penilaian Sikap";
	}
	elseif
	(
	(@$row[nSjujur_sms1] == '1') and (@$row[nSdisiplin_sms1] == '1') and (@$row[nStanggungjawab_sms1] == '0') and (@$row[nStoleransi_sms1] == '0') and (@$row[nSgotongroyong_sms1] == '0') and (@$row[nSpercayadiri_sms1] == '0') and (@$row[nSsopansantun_sms1]=='0'))
	
	{	
		@$predikat 			="D";
		@$deskripsi 		="Selalu Jujur dan Disiplin, Tetapi Perlu Perbaikan Pada Sebagian Besar Aspek Penilaian Sikap";
	}
	elseif
	(
	(@$row[nSjujur_sms1] == '1') and (@$row[nSdisiplin_sms1] == '0') and (@$row[nStanggungjawab_sms1] == '1') and (@$row[nStoleransi_sms1] == '0') and (@$row[nSgotongroyong_sms1] == '0') and (@$row[nSpercayadiri_sms1] == '0') and (@$row[nSsopansantun_sms1]=='0'))
	
	{	
		@$predikat 			="D";
		@$deskripsi 		="Selalu Jujur dan Tanggung Jawab, Tetapi Perlu Perbaikan Pada Sebagian Besar Aspek Penilaian Sikap";
	}
	elseif
	(
	(@$row[nSjujur_sms1] == '1') and (@$row[nSdisiplin_sms1] == '0') and (@$row[nStanggungjawab_sms1] == '0') and (@$row[nStoleransi_sms1] == '0') and (@$row[nSgotongroyong_sms1] == '0') and (@$row[nSpercayadiri_sms1] == '1') and (@$row[nSsopansantun_sms1]=='0'))
	
	{	
		@$predikat 			="D";
		@$deskripsi 		="Selalu Jujur dan Percaya Diri, Tetapi Perlu Perbaikan Pada Sebagian Besar Aspek Penilaian Sikap";
	}
	elseif
	(
	(@$row[nSjujur_sms1] == '1') and (@$row[nSdisiplin_sms1] == '1') and (@$row[nStanggungjawab_sms1] == '0') and (@$row[nStoleransi_sms1] == '1') and (@$row[nSgotongroyong_sms1] == '0') and (@$row[nSpercayadiri_sms1] == '0') and (@$row[nSsopansantun_sms1]=='0'))
	
	{	
		@$predikat 			="D+";
		@$deskripsi 		="Selalu Jujur, Toleransi dan Disiplin, Tetapi Perlu Perbaikan Pada Sebagian Aspek Penilaian Sikap";
	}
	elseif
	(
	(@$row[nSjujur_sms1] == '1') and (@$row[nSdisiplin_sms1] == '0') and (@$row[nStanggungjawab_sms1] == '1') and (@$row[nStoleransi_sms1] == '1') and (@$row[nSgotongroyong_sms1] == '0') and (@$row[nSpercayadiri_sms1] == '0') and (@$row[nSsopansantun_sms1]=='0'))
	
	{	
		@$predikat 			="D+";
		@$deskripsi 		="Selalu Jujur, Toleransi dan Bertanggung Jawab, Tetapi Perlu Perbaikan Pada Sebagian Aspek Penilaian Sikap";
	}
	elseif
	(
	(@$row[nSjujur_sms1] == '1') and (@$row[nSdisiplin_sms1] == '0') and (@$row[nStanggungjawab_sms1] == '0') and (@$row[nStoleransi_sms1] == '1') and (@$row[nSgotongroyong_sms1] == '1') and (@$row[nSpercayadiri_sms1] == '0') and (@$row[nSsopansantun_sms1]=='0'))
	
	{	
		@$predikat 			="D+";
		@$deskripsi 		="Selalu Jujur, Toleransi dan Selalu ikut Bergotong Royong, Tetapi Perlu Perbaikan Pada Sebagian Aspek Penilaian Sikap";
	}
	elseif
	(
	(@$row[nSjujur_sms1] == '1') and (@$row[nSdisiplin_sms1] == '0') and (@$row[nStanggungjawab_sms1] == '0') and (@$row[nStoleransi_sms1] == '1') and (@$row[nSgotongroyong_sms1] == '0') and (@$row[nSpercayadiri_sms1] == '0') and (@$row[nSsopansantun_sms1]=='1'))
	
	{	
		@$predikat 			="D+";
		@$deskripsi 		="Selalu Jujur, Toleransi dan Sopan Santun, Tetapi Perlu Perbaikan Pada Sebagian Aspek Penilaian Sikap";
	}
	elseif
	(
	(@$row[nSjujur_sms1] == '1') and (@$row[nSdisiplin_sms1] == '0') and (@$row[nStanggungjawab_sms1] == '0') and (@$row[nStoleransi_sms1] == '1') and (@$row[nSgotongroyong_sms1] == '0') and (@$row[nSpercayadiri_sms1] == '1') and (@$row[nSsopansantun_sms1]=='0'))
	
	{	
		@$predikat 			="D+";
		@$deskripsi 		="Selalu Jujur, Toleransi dan Sopan Santun, Tetapi Perlu Perbaikan Pada Sebagian Aspek Penilaian Sikap";
	}
	elseif
	(
	(@$row[nSjujur_sms1] == '1') and (@$row[nSdisiplin_sms1] == '1') and (@$row[nStanggungjawab_sms1] == '1') and (@$row[nStoleransi_sms1] == '1') and (@$row[nSgotongroyong_sms1] == '0') and (@$row[nSpercayadiri_sms1] == '0') and (@$row[nSsopansantun_sms1]=='0'))
	
	{	
		@$predikat 			="C";
		@$deskripsi 		="<b>Selalu Jujur, Toleransi, Disiplin dan Tanggug Jawab</b>, Tetapi Perlu Perbaikan Pada Aspek <b>Gotong Royong, Percaya Diri, dan Sopan Santun<b>";
	}

	elseif
	(
	(@$row[nSjujur_sms1] == '1') and (@$row[nSdisiplin_sms1] == '1') and (@$row[nStanggungjawab_sms1] == '0') and (@$row[nStoleransi_sms1] == '1') and (@$row[nSgotongroyong_sms1] == '1') and (@$row[nSpercayadiri_sms1] == '0') and (@$row[nSsopansantun_sms1]=='0'))
	
	{	
		@$predikat 			="C";
		@$deskripsi 		="<b>Selalu Jujur, Toleransi, Disiplin dan Gotong Royong</b>, Tetapi Perlu Perbaikan Pada Aspek <b>Tanggung Jawab, Percaya Diri, dan Sopan Santun<b>";
	}
	elseif
	(
	(@$row[nSjujur_sms1] == '1') and (@$row[nSdisiplin_sms1] == '1') and (@$row[nStanggungjawab_sms1] == '0') and (@$row[nStoleransi_sms1] == '1') and (@$row[nSgotongroyong_sms1] == '0') and (@$row[nSpercayadiri_sms1] == '0') and (@$row[nSsopansantun_sms1]=='1'))
	
	{	
		@$predikat 			="C";
		@$deskripsi 		="<b>Selalu Jujur, Toleransi, Disiplin dan Sopan Santun</b>, Tetapi Perlu Perbaikan Pada Aspek <b>Tanggung Jawab, Percaya Diri, dan Gotong Royong<b>";
	}
	elseif
	(
	(@$row[nSjujur_sms1] == '1') and (@$row[nSdisiplin_sms1] == '0') and (@$row[nStanggungjawab_sms1] == '0') and (@$row[nStoleransi_sms1] == '1') and (@$row[nSgotongroyong_sms1] == '0') and (@$row[nSpercayadiri_sms1] == '1') and (@$row[nSsopansantun_sms1]=='0'))
	
	{	
		@$predikat 			="C";
		@$deskripsi 		="<b>Selalu Jujur, Toleransi,Gotong Royong dan Percaya, Tetapi Perlu Perbaikan Pada Aspek <b>Kedisipinan, Tanggung Jawab, dan Sopan Santun<b>";
	}
	elseif
	(
	(@$row[nSjujur_sms1] == '1') and (@$row[nSdisiplin_sms1] == '1') and (@$row[nStanggungjawab_sms1] == '0') and (@$row[nStoleransi_sms1] == '1') and (@$row[nSgotongroyong_sms1] == '0') and (@$row[nSpercayadiri_sms1] == '1') and (@$row[nSsopansantun_sms1]=='0'))
	
	{	
		@$predikat 			="C";
		@$deskripsi 		="<b>Selalu Jujur, Toleransi, Percaya Diri, dan Disiplin </b>, Tetapi Perlu Perbaikan Pada Aspek <b>Tanggung Jawab , Sopan Santun dan Gotong Royong<b>";
	}
	elseif
	(
	(@$row[nSjujur_sms1] == '1') and (@$row[nSdisiplin_sms1] == '1') and (@$row[nStanggungjawab_sms1] == '1') and (@$row[nStoleransi_sms1] == '1') and (@$row[nSgotongroyong_sms1] == '0') and (@$row[nSpercayadiri_sms1] == '0') and (@$row[nSsopansantun_sms1]=='1'))
	
	{	
		@$predikat 			="C";
		@$deskripsi 		="<b>Selalu Jujur, Toleransi, Percaya Diri, Disiplin,Sopan Santun dan Bertanggung Jawab </b>, Tetapi Perlu Perbaikan Pada Aspek <b> Percaya diri dan Gotong Royong<b>";
	}
	elseif
	(
	(@$row[nSjujur_sms1] == '1') and (@$row[nSdisiplin_sms1] == '1') and (@$row[nStanggungjawab_sms1] == '1') and (@$row[nStoleransi_sms1] == '1') and (@$row[nSgotongroyong_sms1] == '0') and (@$row[nSpercayadiri_sms1] == '1') and (@$row[nSsopansantun_sms1]=='0'))
	
	{	
		@$predikat 			="C";
		@$deskripsi 		="<b>Selalu Jujur, Toleransi, Percaya Diri, Disiplin,Percaya diri dan Bertanggung Jawab </b>, Tetapi Perlu Perbaikan Pada Aspek <b> Sopan Santun dan Gotong Royong<b>";
	}
	elseif
	(
	(@$row[nSjujur_sms1] == '1') and (@$row[nSdisiplin_sms1] == '1') and (@$row[nStanggungjawab_sms1] == '0') and (@$row[nStoleransi_sms1] == '1') and (@$row[nSgotongroyong_sms1] == '0') and (@$row[nSpercayadiri_sms1] == '1') and (@$row[nSsopansantun_sms1]=='1'))
	
	{	
		@$predikat 			="C";
		@$deskripsi 		="<b>Selalu Jujur, Disiplin, Tanggung Jawab, Toleransi, Percaya Diri, dan Sopan Santun,</b> tetapi perlu perbaikan pada Aspek <b> Tanggung Jawab dan Gotong Royong</b>";
	}
	elseif
	(
	(@$row[nSjujur_sms1] == '0') and (@$row[nSdisiplin_sms1] == '0') and (@$row[nStanggungjawab_sms1] == '0') and (@$row[nStoleransi_sms1] == '0') and (@$row[nSgotongroyong_sms1] == '1') and (@$row[nSpercayadiri_sms1] == '1') and (@$row[nSsopansantun_sms1]=='1'))
	
	{	
		@$predikat 			="C";
		@$deskripsi 		="<b>Selalu Percaya Diri, dan Sopan Santun dan Gotong Royong</b> tetapi perlu perbaikan pada Aspek <b> Jujur, Toleransi Tanggung Jawab, dan Disiplin</b>";
	}
	elseif
	(
	(@$row[nSjujur_sms1] == '0') and (@$row[nSdisiplin_sms1] == '0') and (@$row[nStanggungjawab_sms1] == '0') and (@$row[nStoleransi_sms1] == '0') and (@$row[nSgotongroyong_sms1] == '0') and (@$row[nSpercayadiri_sms1] == '1') and (@$row[nSsopansantun_sms1]=='1'))
	
	{	
		@$predikat 			="C";
		@$deskripsi 		="<b>Selalu Percaya Diri, dan Sopan Santun </b> tetapi perlu perbaikan pada Aspek <b> Jujur, Toleransi Tanggung Jawab, dan Gotong Royong, Disiplin</b>";
	}
	elseif
	(
	(@$row[nSjujur_sms1] == '1') and (@$row[nSdisiplin_sms1] == '0') and (@$row[nStanggungjawab_sms1] == '0') and (@$row[nStoleransi_sms1] == '1') and (@$row[nSgotongroyong_sms1] == '1') and (@$row[nSpercayadiri_sms1] == '0') and (@$row[nSsopansantun_sms1]=='1'))
	
	{	
		@$predikat 			="C";
		@$deskripsi 		="<b>Selalu Jujur, Tanggung Jawab, Toleransi, Gotong Royong dan Sopan Santun, tetapi masih perlu perbaikan padan aspek kedisipinan, Tanggung Jawab dan Kepercayaan Diri</b>";
	}
	elseif
	(
	(@$row[nSjujur_sms1] == '1') and (@$row[nSdisiplin_sms1] == '0') and (@$row[nStanggungjawab_sms1] == '1') and (@$row[nStoleransi_sms1] == '1') and (@$row[nSgotongroyong_sms1] == '1') and (@$row[nSpercayadiri_sms1] == '0') and (@$row[nSsopansantun_sms1]=='1'))
	
	{	
		@$predikat 			="C";
		@$deskripsi 		="<b>Selalu Jujur, Tanggung Jawab, Toleransi, Sopan Santun, Gotong Royong,  dan Sopan Santun, tetapi masih perlu perbaikan padan aspek kedisipinan, Sopan Santun dan Kepercayaan Diri</b>";
	}
	elseif
	(
	(@$row[nSjujur_sms1] == '0') and (@$row[nSdisiplin_sms1] == '0') and (@$row[nStanggungjawab_sms1] == '0') and (@$row[nStoleransi_sms1] == '1') and (@$row[nSgotongroyong_sms1] == '1') and (@$row[nSpercayadiri_sms1] == '0') and (@$row[nSsopansantun_sms1]=='1'))
	
	{	
		@$predikat 			="C";
		@$deskripsi 		="<b>Selalu Toleransi, Sopan Santun, Gotong Royong,  dan Sopan Santun, tetapi masih perlu perbaikan padan aspek kedisipinan, , Kejujuran, Sopan Santun dan Kepercayaan Diri</b>";
	}
	elseif
	(
	(@$row[nSjujur_sms1] == '1') and (@$row[nSdisiplin_sms1] == '0') and (@$row[nStanggungjawab_sms1] == '1') and (@$row[nStoleransi_sms1] == '1') and (@$row[nSgotongroyong_sms1] == '0') and (@$row[nSpercayadiri_sms1] == '0') and (@$row[nSsopansantun_sms1]=='1'))
	
	{	
		@$predikat 			="C";
		@$deskripsi 		="<b>Selalu Jujur, Tanggung Jawab, Toleransi, Gotong Royong,  dan Sopan Santun, tetapi masih perlu perbaikan padan aspek kedisipinan, Gotong Royong dan Kedisipinan</b>";
	}
	elseif
	(
	(@$row[nSjujur_sms1] == '1') and (@$row[nSdisiplin_sms1] == '1') and (@$row[nStanggungjawab_sms1] == '0') and (@$row[nStoleransi_sms1] == '0') and (@$row[nSgotongroyong_sms1] == '0') and (@$row[nSpercayadiri_sms1] == '0') and (@$row[nSsopansantun_sms1]=='1'))
	
	{	
		@$predikat 			="C";
		@$deskripsi 		="<b>Selalu Jujur, Disiplin, dan Sopan Santun, Tetapi Perlu Perbaikain Pada Aspek <b>Tangung Jawab, Toleransi, GOtong Royong dan Kepercayaan Diri</b>";
	}
	elseif
	(
	(@$row[nSjujur_sms1] == '1') and (@$row[nSdisiplin_sms1] == '0') and (@$row[nStanggungjawab_sms1] == '0') and (@$row[nStoleransi_sms1] == '1') and (@$row[nSgotongroyong_sms1] == '1') and (@$row[nSpercayadiri_sms1] == '1') and (@$row[nSsopansantun_sms1]=='0'))
	
	{	
		@$predikat 			="C";
		@$deskripsi 		="<b>Selalu Jujur, Toleransi, Gotong Royong, Percaya Diri, Tetapi Perlu Perbaikain Pada Aspek <b>Disiplin, Tanggung Jawab, dan Sopan Santun</b>";
	}
	elseif
	(
	(@$row[nSjujur_sms1] == '0') and (@$row[nSdisiplin_sms1] == '0') and (@$row[nStanggungjawab_sms1] == '0') and (@$row[nStoleransi_sms1] == '1') and (@$row[nSgotongroyong_sms1] == '0') and (@$row[nSpercayadiri_sms1] == '0') and (@$row[nSsopansantun_sms1]=='1'))
	
	{	
		@$predikat 			="D";
		@$deskripsi 		="<b>Selalu Sopan Santun, Toleransi Tetapi Perlu Perbaikan Pada Aspek Kejujuran, Kedisiplinan, TAngugng Jawab, Gotong Royong dan Kepercayaan Diri </b>";
	}
	elseif
	(
	(@$row[nSjujur_sms1] == '1') and (@$row[nSdisiplin_sms1] == '1') and (@$row[nStanggungjawab_sms1] == '1') and (@$row[nStoleransi_sms1] == '0') and (@$row[nSgotongroyong_sms1] == '0') and (@$row[nSpercayadiri_sms1] == '0') and (@$row[nSsopansantun_sms1]=='1'))
	
	{	
		@$predikat 			="C";
		@$deskripsi 		="<b>Selalu Jujur, Disiplin, Tanggung Jawab, dan Sopan Santun, Tapi Perlu Perbaikan Pada Aspek Toleransi, Gotong Royong, dan Kepercayaan Diri </b>";
	}
	elseif
	(
	(@$row[nSjujur_sms1] == '1') and (@$row[nSdisiplin_sms1] == '1') and (@$row[nStanggungjawab_sms1] == '1') and (@$row[nStoleransi_sms1] == '0') and (@$row[nSgotongroyong_sms1] == '1') and (@$row[nSpercayadiri_sms1] == '0') and (@$row[nSsopansantun_sms1]=='1'))
	
	{	
		@$predikat 			="B";
		@$deskripsi 		="<b>Selalu Jujur, Disiplin, Tanggung Jawab, dan Sopan Santun, Tapi Perlu Perbaikan Pada Aspek Toleransi, dan Kepercayaan Diri </b>";
	}
	elseif
	(
	(@$row[nSjujur_sms1] == '1') and (@$row[nSdisiplin_sms1] == '0') and (@$row[nStanggungjawab_sms1] == '1') and (@$row[nStoleransi_sms1] == '0') and (@$row[nSgotongroyong_sms1] == '1') and (@$row[nSpercayadiri_sms1] == '0') and (@$row[nSsopansantun_sms1]=='1'))
	
	{	
		@$predikat 			="B";
		@$deskripsi 		="<b>Selalu Jujur, Tanggung Jawab, dan Sopan Santun, Tapi Perlu Perbaikan Pada Aspek Toleransi, Disiplin dan Kepercayaan Diri </b>";
	}
	elseif
	(
	(@$row[nSjujur_sms1] == '1') and (@$row[nSdisiplin_sms1] == '1') and (@$row[nStanggungjawab_sms1] == '0') and (@$row[nStoleransi_sms1] == '0') and (@$row[nSgotongroyong_sms1] == '1') and (@$row[nSpercayadiri_sms1] == '0') and (@$row[nSsopansantun_sms1]=='1'))
	
	{	
		@$predikat 			="B";
		@$deskripsi 		="<b>Selalu Jujur,Disiplin ,Gotong Royong dan Sopan Santun, Tapi Perlu Perbaikan Pada Aspek Toleransi,Tanggung Jawab dan Kepercayaan Diri </b>";
	}
	elseif
	(
	(@$row[nSjujur_sms1] == '0') and (@$row[nSdisiplin_sms1] == '1') and (@$row[nStanggungjawab_sms1] == '1') and (@$row[nStoleransi_sms1] == '0') and (@$row[nSgotongroyong_sms1] == '1') and (@$row[nSpercayadiri_sms1] == '0') and (@$row[nSsopansantun_sms1]=='1'))
	
	{	
		@$predikat 			="C";
		@$deskripsi 		="<b>Selalu Disiplin ,Tanggung Jawab, Gotong Royong dan Sopan Santun, Tapi Perlu Perbaikan Pada Aspek Kejujuran, Toleransi, dan Kepercayaan Diri </b>";
	}
	else
	{
		$deskripsi="Nilai Masih Kosong";
	}
?>