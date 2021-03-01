<?php

/*
// /srv/http/bootcamp/ -> /srv/http/bootcamp
basename("/media/avatar.jpg", ".jpg");
// /media/avatar.jpg -> /media/avatar
dirname("C://Sunucum/Resimlerim/user1.png", 2);
*/

if (file_exists("./imagess")) {
    echo "images dizini var!";
} else {
    echo "images dizinini bulamadım!";
}

