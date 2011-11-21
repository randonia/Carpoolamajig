#!/bin/bash
rsync -r --progress --exclude=.git --exclude=application/config/database.php * zambinid@zambinidirect.com:~/carpoolamajig
