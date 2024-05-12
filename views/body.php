<?php

function getBody($haveNav = true)
{
    $haveNav = $haveNav ?? true;
    echo '
    <body>
        '.($haveNav) ? NAV : ''.' 
        <div class="pt-3" style="height: calc(100vh - 100px); overflow-y: auto;">';
}

function getFooter()
{
    echo '
    </div>
    </body>';
}
