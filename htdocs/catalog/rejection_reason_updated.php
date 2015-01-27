<?php
#
# Shows confirmation for rejection reason update
#
include("redirect.php");
include("includes/header.php"); 
LangUtil::setPageId("catalog");
?>
<br>
<b><?php echo "Specimen Rejection Reason Updated"; ?></b>
 | <a href='catalog.php?show_rp=1'>&laquo; <?php echo LangUtil::$pageTerms['CMD_BACK_TOCATALOG']; ?></a>
<br><br>
<?php 
$rejection_reason = get_rejection_reason_by_id($_REQUEST['rr']);
$page_elems->getRejectionReasonInfo($rejection_reason->description); 
include("includes/footer.php");
?>