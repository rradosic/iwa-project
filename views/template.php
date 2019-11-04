<?php
    function template_shutdown() {
        $template="main.iwa.php";
        $content = ob_get_clean();
        require($template);
    }
    register_shutdown_function('template_shutdown');
    ob_start();
