#!/bin/sh

echo "Fixing permissions"
chgrp -R fink .
chmod -f -R g+w,a+r .
chmod -f 444 db.inc.php
