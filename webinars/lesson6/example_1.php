<?php

$page = defineRequiredPage();
function defineRequiredPage()
{
    if (isset($_GET['page'])) {
        return is_numeric($_GET['page']) && intval($_GET['page']) == $_GET['page'] && $_GET['page'] > 0 ? $_GET['page'] : 1;
    } else {
        return 1;
    }
};

echo $page;
