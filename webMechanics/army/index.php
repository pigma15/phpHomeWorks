<?php
require __DIR__.'/bootstrap.php';
$uri = explode('/',str_replace(INSTALL_DIR, '', $_SERVER['REQUEST_URI']));

// ROUTING

if ('' == $uri[0]) {
    (new ArmyController)->index();
}
elseif ('create' == $uri[0]) {
    (new ArmyController)->create();
}
elseif ('logout' == $uri[0]) {
    (new ArmyController)->logout();
}
elseif ('login' == $uri[0]) {
    (new ArmyController)->login();
} 
elseif ('list' == $uri[0]) {
    (new ArmyController)->list();
}
elseif ('private' == $uri[0]) {
    (new ArmyController)->private();
} 
elseif ('delete' == $uri[0]) {
    (new ArmyController)->delete($uri[1]);   
}
elseif ('add' == $uri[0]) {
    (new ArmyController)->add($uri[1]);   
} 
else {
    (new ArmyController)->index();
}

?>
