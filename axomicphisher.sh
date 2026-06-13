source core.sh
source site.sh
source tunnel.sh
source menu.sh
source setup.sh
trap 'killpid' INT TERM
deps
mainmenu
