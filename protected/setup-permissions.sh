#!/bin/bash
HTTPDUSER=`ps aux | grep -E '[a]pache|[h]ttpd|[_]www|[w]ww-data|[n]ginx' | grep -v root | head -1 | cut -d\  -f1`

# try to set permissions with both ways

sudo chmod +a "$HTTPDUSER allow delete,write,append,file_inherit,directory_inherit" ../assets runtime
sudo chmod +a "`whoami` allow delete,write,append,file_inherit,directory_inherit" ../assets runtime

sudo setfacl -R -m u:"$HTTPDUSER":rwX -m u:`whoami`:rwX ../assets runtime
sudo setfacl -dR -m u:"$HTTPDUSER":rwX -m u:`whoami`:rwX ../assets runtime