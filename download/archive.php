<?php
$title = "Archive Browser";
$cvs_author = '$Author: thesin $';
$cvs_date = '$Date: 2016/09/21 14:53:37 $';

include "header.inc";
?>

<script type="application/javascript">

window.addEventListener('message', function(e) {
    if (e.data[0] == 'setHeight') {
        document.getElementById( 'bindistFrame' ).height = e.data[1];
    }
}, false);

</script>

<iframe id="bindistFrame" src="http://bindist.finkproject.org/" scrolling="no" frameborder="no" marginheight="0" marginwidth="0" width="100%"></iframe>

<?php
include "footer.inc";
?>
