#!/bin/sh

echo "Fixing permissions"
chmod -f -R g+w,a+r .
chgrp -R fink .
chmod a-w db.inc.php
