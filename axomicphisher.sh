#!/usr/bin/env bash
source core.sh
source tunnel.sh 
source site.sh
source menu.sh
source setup.sh
trap 'killpid' INT TERM
deps
mainmenu
