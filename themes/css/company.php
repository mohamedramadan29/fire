<?php
ob_start();
$pagetitle = "الفئات";
session_start();
include "init.php";
$page = "";
if ( isset( $_GET["page"] ) ) {
    $page = $_GET["page"];
} else {
    $page = "manage";
}
if ( $page == "add" ) {

  include "company/add_company.php";
} elseif ( $page == "edit" ) {
  include "company/edit_company.php";

} elseif ( $page == "delete" ) {
   include "company/delete_company.php";
}
?>

</div>
</div>


<?php
include $tem . "footer_linked.php";
include $tem . "footer.php";
ob_end_flush();

?>
<script type="text/javascript">
var dev = $("#logo").dropify({
 });
 dev = dev.data("dropify")
 var dev2 = $("#logo2").dropify({
  });
  dev2 = dev2.data("dropify")
  var dev3 = $("#logo3").dropify({
   });
   dev2 = dev3.data("dropify")
</script>
