<?php
    include '../configakademik.php';

    $header = '';
    $result ='';
    $exportData = $con->query("SELECT * from tbl_siswa where siswa_aktif='A' ");
     
    $fields = mysql_num_fields($exportData );
     
    for ( $i = 0; $i < $fields; $i++ )
    {
        $header .= mysql_field_name( $exportData , $i ) . "\t";
    }
     
    while( $row = mysqli_fetch_row( $exportData ) )
    {
        $line = '';
        foreach( $row as $value )
        {                                            
            if ( ( !isset( $value ) ) || ( $value == "" ) )
            {
                $value = "\t";
            }
            else
            {
                $value = str_replace( '"' , '""' , $value );
                $value = '"' . $value . '"' . "\t";
            }
            $line .= $value;
        }
        $result .= trim( $line ) . "\n";
    }
    $result = str_replace( "\r" , "" , $result );
     
    if ( $result == "" )
    {
        $result = "\nNo Record(s) Found!\n";                        
    }
     
    header("Content-type: application/octet-stream");
    header("Content-Disposition: attachment; filename=export.xls");
    header("Pragma: no-cache");
    header("Expires: 0");
    print "$header\n$result";

    header("location:?page=data-siswa");
     
?>