<?php
    session_start();
    include "../config.php";
   // include "sesi_login.php";
    if (@$_GET[modul]=='inputnilaipengetahuan')
    {
        
        @$semester      = $_POST['rombel'];
        @$id	        = $_GET['kode'];
        @$kodea	        = $_POST['kode'];
        @$nh1	        = $_POST['nh'];
        @$uts	        = $_POST['uts'];
        @$uas	        = $_POST['uas'];
        @$hadir         = $_POST['hadir'];
        @$harian        = $_POST['harian'];
        @$mapelkode     = $_POST[mapelkode];
        @$rombelkode    = $_POST[rombelkode];
        
        if (($nh1 <= 100) and ($uts <= 100) and ($uas <= 100))
        {
            if (@$semester == 1){
                $con->query("update tbl_transkrip_sms1 set 
                            nh_sms1		=$harian, 
                            pts_sms1	=$uts,
                            pas_sms1	=$uas,
                            absen_sms1 	=$hadir
                        where nilai_id	=$kodea	");
            }elseif (@$semester == 2){
                $con->query("update tbl_transkrip_sms2 set 
                            nh_sms1		=$harian, 
                            pts_sms1	=$uts,
                            pas_sms1	=$uas,
                            absen_sms1 	=$hadir
                        where nilai_id	=$kodea	");
            }elseif (@$semester == 3){
                $con->query("update tbl_transkrip_sms3 set 
                            nh_sms1		=$harian, 
                            pts_sms1	=$uts,
                            pas_sms1	=$uas,
                            absen_sms1 	=$hadir
                        where nilai_id	=$kodea	");

            }elseif (@$semester == 4){
                $con->query("update tbl_transkrip_sms4 set 
                            nh_sms1		=$harian, 
                            pts_sms1	=$uts,
                            pas_sms1	=$uas,
                            absen_sms1 	=$hadir
                        where nilai_id	=$kodea	");
            }elseif (@$semester == 5){
                $con->query("update tbl_transkrip_sms5 set 
                            nh_sms1		=$harian, 
                            pts_sms1	=$uts,
                            pas_sms1	=$uas,
                            absen_sms1 	=$hadir
                        where nilai_id	=$kodea	");
            }elseif (@$semester == 6){
                $con->query("update tbl_transkrip_sms6 set 
                            nh_sms1		=$harian, 
                            pts_sms1	=$uts,
                            pas_sms1	=$uas,
                            absen_sms1 	=$hadir
                        where nilai_id	=$kodea	");
            }
            
            
            //echo "<meta http-equiv='refresh' content='0.2;URL=?page=input-nilai-pengetahuan&mapel-kd=$mapelkode&rombel-kd=$rombelkode&kur-id=2&semester=$semester'>";
            header("Location:index.php?page=input-nilai-pengetahuan&mapel-kd=$mapelkode&rombel-kd=$rombelkode&kur-id=2&semester=$semester");
        }
        else
        {
            echo "DATA YANG ANDA MASUKKAN SALAH";
            //header("Location:?page=input-nilai-pengetahuan&mapel-kd=$kode&rombel-kd=$rombel&kur-id=2&semester=$semester");
        }       
    }
    elseif (@$_GET[modul]=='inputnilaiketerampilan')
    {
        @$semester      = $_POST['rombel'];
        @$id		=	$_GET['kode'];
        @$kodea		=	$_POST['kode'];
        @$nh1		=	$_POST['praktik'];
        @$uts		=	$_POST['rata'];
        @$uas		=	$_POST['produk'];
        @$mapelkode     = $_POST[mapelkode];
        @$rombelkode    = $_POST[rombelkode];
        //@$praktik	=	$_POST['praktik'];
        
        if (($nh1 <= 100) and ($uts <= 100) and ($uas <= 100))
        {
            if ($semester == 1)
            {
                $con->query("update tbl_transkrip_sms1 set 
                            nPraktik_sms1		=$nh1, 
                            nProyek_sms1		=$uts,
                            nProduk_sms1		=$uas
                            
                        where nilai_id	=$kodea	");
            }
            elseif ($semester == 2)  
            {
                $con->query("update tbl_transkrip_sms2 set 
                            nPraktik_sms1		=$nh1, 
                            nProyek_sms1		=$uts,
                            nProduk_sms1		=$uas
                            
                        where nilai_id	=$kodea	");
            }
            elseif ($semester == 3)  
            {
                $con->query("update tbl_transkrip_sms3 set 
                            nPraktik_sms1		=$nh1, 
                            nProyek_sms1		=$uts,
                            nProduk_sms1		=$uas
                            
                        where nilai_id	=$kodea	");
            }
            elseif ($semester == 4)  
            {
                $con->query("update tbl_transkrip_sms4 set 
                            nPraktik_sms1		=$nh1, 
                            nProyek_sms1		=$uts,
                            nProduk_sms1		=$uas
                            
                        where nilai_id	=$kodea	");
            }
            elseif ($semester == 5)  
            {
                $con->query("update tbl_transkrip_sms5 set 
                            nPraktik_sms1		=$nh1, 
                            nProyek_sms1		=$uts,
                            nProduk_sms1		=$uas
                            
                        where nilai_id	=$kodea	");
            }
            elseif ($semester == 6)  
            {
                $con->query("update tbl_transkrip_sms6 set 
                            nPraktik_sms1		=$nh1, 
                            nProyek_sms1		=$uts,
                            nProduk_sms1		=$uas
                            
                        where nilai_id	=$kodea	");
            }
            header("Location:index.php?page=input-nilai-keterampilan&mapel-kd=$mapelkode&rombel-kd=$rombelkode&kur_id=2&semester=$semester");
            
        }
        else
        {
            echo "DATA YANG ANDA MASUKKAN SALAH";
            echo "<meta http-equiv='refresh' content='0.2;URL=?page=input-nilai-keterampilan&mapel-kd=$kode&rombel-kd=$rombel&kur-id=2&semester=$semester'>";
        }
    }
?>