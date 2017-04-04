<?php

return array(


    'pdf' => array(
        'enabled' => true,
        'binary' => env('WKHTML_PATH', '/usr/local/bin/wkhtmltopdf-amd64'),
        // 'binary'  => '/usr/local/bin/wkhtmltopdf',
        //Nonvagrant
        // 'binary' => base_path('vendor/h4cc/wkhtmltopdf-amd64/bin/wkhtmltopdf-amd64'),
        // Vagrant
        // 'binary'  => '/usr/local/bin/wkhtmltopdf-amd64',
        // Windows
        // 'binary' => '"C:\Program Files\wkhtmltopdf\bin\wkhtmltopdf"'
        'timeout' => false,
        'options' => array(),
        'env'     => array(),
    ),
    'image' => array(
        'enabled' => true,
        'binary'  => '/usr/local/bin/wkhtmltoimage',
        'timeout' => false,
        'options' => array(),
        'env'     => array(),
    ),


);
