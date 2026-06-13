deps() {
    if [[ -f ".deps" ]]; then return; fi
    touch .deps
    printf "${blue}[i] ${white}checking dependencies . . .${reset}\n"
    if [[ -x "$(command -v pkg)" ]]; then
        pkg update -y && pkg upgrade -y
        pkg install git curl wget php openssh -y
        pkg install termux-api -y
    elif [[ -x "$(command -v apt)" ]]; then
        apt update -y && apt upgrade -y
        apt install git curl wget php openssh -y
    elif [[ -x "$(command -v pacman)" ]]; then
        pacman -Syu --noconfirm
        pacman -S git curl wget php openssh --noconfirm
    elif [[ -x "$(command -v dnf)" ]]; then
        dnf install git curl wget php openssh -y
    elif [[ -x "$(command -v yum)" ]]; then
        yum install git curl wget php openssh -y
    else
        printf "${red}[!] ${white}unsupported. install php, curl, git, openssh manually.${reset}\n"
        exit 1
    fi
    printf "${green}[+] ${white}dependencies ready.${reset}\n"
}
