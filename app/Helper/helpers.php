<?php

// Ativar link na sidebar
function activesidebar(array $route)
{
    if(is_array($route)){
        foreach ($route as $r) {
            if (request()->routeIs($r)) {
                return 'active';
            }
        }
    }
}
