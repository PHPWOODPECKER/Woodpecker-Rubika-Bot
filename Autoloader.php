
<?php
spl_autoload_register(function ($class) {
  
  $class = str_replace('\\', '/', $class);
  $class = str_replace('Woodpecker/', '', $class);
    
    $base_dir = __DIR__ . '/';
    $file = $base_dir . '/src/'. $class. '.php';
    if (file_exists($file)) {
        require $file;
    }
});

function woodpecker_load_core($base_dir) {
    $core_classes = [
        'Woodpecker\\Support\\Update',
        'Woodpecker\\Support\\NewMessageUpdate',
        'Woodpecker\\Support\\InlineMessage',
        'Woodpecker\\Support\\Api',
        'Woodpecker\\Core\\Bot'
    ];
    
    foreach ($core_classes as $class) {
        if (!class_exists($class)) {
            require_once($file = $base_dir . str_replace('\\', '/', $class) . '.php');
        }
    }
}

return true;
?>
