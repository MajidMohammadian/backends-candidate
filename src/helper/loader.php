<?php
function controller($controller, $function = 'index') {
    $file = DIR_CONTROLLER . '/' . $controller . 'Controller.php';

    if(file_exists($file)) {
        require_once($file);

        $class = $controller . 'Controller';
        if(class_exists($class)) {
            $object = new $class();

            return $object->$function();
        }
    } else {
        trigger_error('Error: Could not load controller ' . $file . '!');
        exit();
    }
}

function model($model, $function) {
    $file = DIR_MODEL . $model . 'Model.php';

    if(file_exists($file)) {
        require_once($file);

        $class = $model . 'Model';
        if(class_exists($class)) {
            $object = new $class();

            return $object->$function();
        }
    } else {
        trigger_error('Error: Could not load model ' . $file . '!');
        exit();
    }
}

function view($template, $data = []) {
    $file = DIR_TEMPLATE . $template . '.tpl';

    if(file_exists($file)) {
        extract($data);

        ob_start();

        require_once($file);

        $output = ob_get_contents();

        ob_end_clean();

        return $output;
    } else {
        trigger_error('Error: Could not load template ' . $file . '!');
        exit();
    }
}