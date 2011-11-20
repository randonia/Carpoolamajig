#!/bin/bash
scp zambinid@zambinidirect.com:~/public_html/carpoolamajig.com/application/config/database.php zambinid@zambinidirect.com:~/public_html/carpoolamajig.com/application/config/database.php-back 
rsync -r --progress --exclude=.git * zambinid@zambinidirect.com:~/carpoolamajig
scp zambinid@zambinidirect.com:~/public_html/carpoolamajig.com/application/config/database.php-back zambinid@zambinidirect.com:~/public_html/carpoolamajig.com/application/config/database.php
