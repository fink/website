#!/bin/sh

echo "Updating CVS..."
cvs -q update -dP

./fix_perm.sh
