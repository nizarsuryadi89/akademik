<?php
    $nis    = $_GET['nis'];
    $query  = "SELECT mapel_nama FROM tbl_mapel a inner join tbl_transkrip_sms1 b on a.mapel_id = b.mapel_id 
                    left join tbl_transkrip_sms2 c on a.mapel_id = c.mapel_id 
                        left join tbl_transkrip_sms3 d on a.mapel_id = d.mapel_id
                            where b.siswa_nis = '$nis' 
                                GROUP BY a.mapel_id";
    $mapel  = $con->query($query);

    echo "$query";
?>
    <div class="col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                Transkrip Nilai
            </div>
            <div class="panel-body">
                <table>
                    <tr>
                        <th>Mata Pelajaran</th>
                    </tr>
                <?php 
                    foreach($mapel as $data){
                ?>
                    <tr>
                        <td><?= $data['mapel_nama']?></td>
                    </tr>
                <?php
                    }
                ?>
                </table>
            </div>
        </div>
    </div>
