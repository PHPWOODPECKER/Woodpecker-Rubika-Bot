
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

