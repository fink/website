#!/bin/sh

echo "Fixing permissions"
if [ `hostname` = "sampson.opendarwin.org" ]; then
 chgrp -R fink .
fi
chmod -f -R g+w,a+r .
chmod -f 444 db.inc.php
