<?php
// // Checking term "localhost" in url execution... if TRUE Test mode enable.
if(strpos(url(), "localhost")){
    /**
     * CSS
     */
    $minCSS = new \MatthiasMullie\Minify\CSS();

    //Add file css general from shared/styles
    $minCSS->add(__DIR__."/../../shared/styles/styles.css");
    $minCSS->add(__DIR__."/../../shared/styles/boot.css");

    //Add file css from theme.
    // Getting directory CSS theme.
    $cssDir = scandir(__DIR__."/../../themes/".CONF_VIEW_THEME."/assets/css");
    foreach ($cssDir as $css){
        // Getting files in directory
        $cssFile = __DIR__."/../../themes/".CONF_VIEW_THEME."/assets/css/{$css}";
        // Checking if file is css type.
        if(is_file($cssFile) && pathinfo($cssFile)['extension'] == "css"){
            $minCSS->add($cssFile);
        }
    }

    // Creating minify css file in directory of theme.
    $minCSS->minify(__DIR__."/../../themes/".CONF_VIEW_THEME."/assets/style.css");

    /**
     * JS
     */
    $minJS = new \MatthiasMullie\Minify\JS();

    //Add file css general from shared/styles
    $minJS->add(__DIR__."/../../shared/scripts/jquery.min.js");
    $minJS->add(__DIR__."/../../shared/scripts/jquery-ui.js");

    //Add file js from theme.
    // Getting directory JS theme.
    $jsDir = scandir(__DIR__."/../../themes/".CONF_VIEW_THEME."/assets/js");
    foreach ($jsDir as $js){
        // Getting files in directory
        $jsFile = __DIR__."/../../themes/".CONF_VIEW_THEME."/assets/js/{$js}";
        // Checking if file is js type.
        if(is_file($jsFile) && pathinfo($jsFile)['extension'] == "js"){
            $minJS->add($jsFile);
        }
    }

    // Creating minify css file in directory of theme.
    $minJS->minify(__DIR__."/../../themes/".CONF_VIEW_THEME."/assets/script.js");

}