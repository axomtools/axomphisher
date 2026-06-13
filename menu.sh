portoption() {
    printf "${blue}[?] ${white}use custom port (y/n) [default 8080] : ${reset}"
    read -r portchoice
    if [[ "$portchoice" == "y" ]]; then
        printf "${blue}[?] ${white}enter port (1024-9999) : ${reset}"
        read -r port
        if [[ "$port" -ge 1024 && "$port" -le 9999 ]]; then
            printf "${green}[i] ${white}using port: $port${reset}\n"
        else
            printf "${red}[!] ${white}invalid port. using 8080.${reset}\n"
            port=8080
        fi
    else
        port=8080
    fi
}

editsite() {
    banner
    printf "${green}[i] ${white}editing site files ...${reset}\n"
    if [[ -f ".sites/$site/index.php" ]]; then
        nano ".sites/$site/index.php"
    elif [[ -f ".sites/$site/login.html" ]]; then
        nano ".sites/$site/login.html"
    else
        printf "${red}[!] ${white}no index or login file found.${reset}\n"
    fi
    showmenu
}

mainmenu() {
    while true; do
        banner
        printf "${green}  [01]${white} select site\n"
        printf "${green}  [02]${white} edit site files\n"
        printf "${green}  [00]${white} exit\n"
        printf "\n${blue}┌─[${white}main menu${blue}]──[${white}~${blue}]\n${blue}└──╼ ${white}"
        read -r mainchoice
        case $mainchoice in
            1) portoption; showmenu;;
            2) if [[ -z "$site" ]]; then
                   printf "${red}[!] ${white}no site selected. select a site first.${reset}\n"
                   sleep 2
               else
                   editsite
               fi;;
            00) killpid;;
            *) mainmenu;;
        esac
    done
}
