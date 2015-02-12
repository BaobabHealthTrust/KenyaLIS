<?php
#
# Shows confirmation for rejection reason update
#
include("redirect.php");
include("includes/header.php"); 
LangUtil::setPageId("catalog");
?>
<br>
<b><?php echo "Update successful"; ?></b>
 | <a href='catalog.php?show_tct=1'>&laquo; <?php echo LangUtil::$pageTerms['CMD_BACK_TOCATALOG']; ?></a>
<br><br>
<?php 
include("includes/footer.php");
?>
