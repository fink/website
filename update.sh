#!/bin/sh

echo "Updating CVS..."
if [ `hostname` = "sancho.opendarwin.org" ]; then
 /usr/local/bin/cvs update
else
 cvs -q update -dP
fi

./fix_perm.sh
