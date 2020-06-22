<?php
	//nilai raport
		$na			=((($harian+$uts)/2)+(2*$uas))/3;
		$raport		=round($na,1);
		
		//huruf
		if (($raport>=90) and ($raport <=100))
		{$huruf		="A";}else
		if (($raport>=80.00) and ($raport<=89.99))
		{$huruf		="B";}else
		if (($raport>=70.00) and ($raport<=79.99))
		{$huruf		="C";}else
		if (($raport>=60.00) and ($raport<=69.99))
		{$huruf		="D";}else
		if (($raport<=59.99)and ($raport>=1))
		{$huruf	="E";}else{$huruf="-";}
		
		//k13	
		$k4		= (($raport*4)/100);	
		$k13	= round($k4,1);
		
		//keterangan
		if ($raport >=$kkm)
		{$ket="<font color='blue'>Tuntas</font>";}else
		if ($raport <=$kkm)
		{$ket="<font color='red'>Belum</font>";}
?>