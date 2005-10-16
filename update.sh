#!/bin/sh

echo "Updating CVS..."
if [ `hostname` = "sampson.opendarwin.org" ]; then
 /usr/bin/cvs update
else
 cvs -q update -dP
fi

./fix_perm.sh
