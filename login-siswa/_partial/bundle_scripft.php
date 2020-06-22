<script type="text/javascript">
$(".open_modal").click(function(e) {
  var m = $(this).attr("id");
    $.ajax({
      url: "action/nilai-harian.php",
      type: "GET",
      data : {nilai_id: m,},
      success: function (ajaxData){
      $("#nilaiharian").html(ajaxData);
      $("#nilaiharian").modal('show',{backdrop: 'true'});
      }
    });
  });
</script>

<script type="text/javascript">
$(".open_modal").click(function(e) {
  var m = $(this).attr("id");
    $.ajax({
      url: "action/produksi.php",
      type: "GET",
      data : {beli_id: m,},
      success: function (ajaxData){
      $("#modalproduksi").html(ajaxData);
      $("#modalproduksi").modal('show',{backdrop: 'true'});
      }
    });
  });
</script>

