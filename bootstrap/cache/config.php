<?php return array (
  'app' => 
  array (
    'name' => 'PhimHay',
    'env' => 'local',
    'debug' => true,
    'url' => 'https://film.dungthinh.com',
    'timezone' => 'Asia/Calcutta',
    'locale' => 'en',
    'fallback_locale' => 'en',
    'key' => 'base64:ZFLW+anHQlFZ6VSL6/GWT/5R2HLYX2WZjsOaizVBGyI=',
    'cipher' => 'AES-256-CBC',
    'log' => 'single',
    'log_level' => 'debug',
    'providers' => 
    array (
      0 => 'Illuminate\\Auth\\AuthServiceProvider',
      1 => 'Illuminate\\Broadcasting\\BroadcastServiceProvider',
      2 => 'Illuminate\\Bus\\BusServiceProvider',
      3 => 'Illuminate\\Cache\\CacheServiceProvider',
      4 => 'Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider',
      5 => 'Illuminate\\Cookie\\CookieServiceProvider',
      6 => 'Illuminate\\Database\\DatabaseServiceProvider',
      7 => 'Illuminate\\Encryption\\EncryptionServiceProvider',
      8 => 'Illuminate\\Filesystem\\FilesystemServiceProvider',
      9 => 'Illuminate\\Foundation\\Providers\\FoundationServiceProvider',
      10 => 'Illuminate\\Hashing\\HashServiceProvider',
      11 => 'Illuminate\\Mail\\MailServiceProvider',
      12 => 'Illuminate\\Notifications\\NotificationServiceProvider',
      13 => 'Illuminate\\Pagination\\PaginationServiceProvider',
      14 => 'Illuminate\\Pipeline\\PipelineServiceProvider',
      15 => 'Illuminate\\Queue\\QueueServiceProvider',
      16 => 'Illuminate\\Redis\\RedisServiceProvider',
      17 => 'Illuminate\\Auth\\Passwords\\PasswordResetServiceProvider',
      18 => 'Illuminate\\Session\\SessionServiceProvider',
      19 => 'Illuminate\\Translation\\TranslationServiceProvider',
      20 => 'Illuminate\\Validation\\ValidationServiceProvider',
      21 => 'Illuminate\\View\\ViewServiceProvider',
      22 => 'DevMarketer\\EasyNav\\EasyNavServiceProvider',
      23 => 'Collective\\Html\\HtmlServiceProvider',
      24 => 'PragmaRX\\Tracker\\Vendor\\Laravel\\ServiceProvider',
      25 => 'SocialiteProviders\\Manager\\ServiceProvider',
      26 => 'App\\Providers\\AppServiceProvider',
      27 => 'App\\Providers\\AuthServiceProvider',
      28 => 'App\\Providers\\EventServiceProvider',
      29 => 'App\\Providers\\RouteServiceProvider',
      30 => 'Laravel\\Cashier\\CashierServiceProvider',
      31 => 'Pbmedia\\LaravelFFMpeg\\FFMpegServiceProvider',
      32 => 'Unicodeveloper\\Paystack\\PaystackServiceProvider',
      33 => 'Kevupton\\LaravelCoinpayments\\Providers\\LaravelCoinpaymentsServiceProvider',
      34 => 'Vimeo\\Laravel\\VimeoServiceProvider',
      35 => 'Yajra\\DataTables\\DataTablesServiceProvider',
    ),
    'aliases' => 
    array (
      'App' => 'Illuminate\\Support\\Facades\\App',
      'Artisan' => 'Illuminate\\Support\\Facades\\Artisan',
      'Auth' => 'Illuminate\\Support\\Facades\\Auth',
      'Blade' => 'Illuminate\\Support\\Facades\\Blade',
      'Broadcast' => 'Illuminate\\Support\\Facades\\Broadcast',
      'Bus' => 'Illuminate\\Support\\Facades\\Bus',
      'Cache' => 'Illuminate\\Support\\Facades\\Cache',
      'Config' => 'Illuminate\\Support\\Facades\\Config',
      'Cookie' => 'Illuminate\\Support\\Facades\\Cookie',
      'Crypt' => 'Illuminate\\Support\\Facades\\Crypt',
      'DB' => 'Illuminate\\Support\\Facades\\DB',
      'Eloquent' => 'Illuminate\\Database\\Eloquent\\Model',
      'Event' => 'Illuminate\\Support\\Facades\\Event',
      'File' => 'Illuminate\\Support\\Facades\\File',
      'Gate' => 'Illuminate\\Support\\Facades\\Gate',
      'Hash' => 'Illuminate\\Support\\Facades\\Hash',
      'Lang' => 'Illuminate\\Support\\Facades\\Lang',
      'Log' => 'Illuminate\\Support\\Facades\\Log',
      'Mail' => 'Illuminate\\Support\\Facades\\Mail',
      'Notification' => 'Illuminate\\Support\\Facades\\Notification',
      'Password' => 'Illuminate\\Support\\Facades\\Password',
      'Queue' => 'Illuminate\\Support\\Facades\\Queue',
      'Redirect' => 'Illuminate\\Support\\Facades\\Redirect',
      'Redis' => 'Illuminate\\Support\\Facades\\Redis',
      'Request' => 'Illuminate\\Support\\Facades\\Request',
      'Response' => 'Illuminate\\Support\\Facades\\Response',
      'Route' => 'Illuminate\\Support\\Facades\\Route',
      'Schema' => 'Illuminate\\Support\\Facades\\Schema',
      'Session' => 'Illuminate\\Support\\Facades\\Session',
      'Storage' => 'Illuminate\\Support\\Facades\\Storage',
      'URL' => 'Illuminate\\Support\\Facades\\URL',
      'Validator' => 'Illuminate\\Support\\Facades\\Validator',
      'View' => 'Illuminate\\Support\\Facades\\View',
      'Form' => 'Collective\\Html\\FormFacade',
      'Html' => 'Collective\\Html\\HtmlFacade',
      'Nav' => 'DevMarketer\\EasyNav\\EasyNavFacade',
      'Tracker' => 'PragmaRX\\Tracker\\Vendor\\Laravel\\Facade',
      'Socialite' => 'Laravel\\Socialite\\Facades\\Socialite',
      'FFMpeg' => 'Pbmedia\\LaravelFFMpeg\\FFMpegFacade',
      'Vimeo' => 'Vimeo\\Laravel\\Facades\\Vimeo',
      'Paystack' => 'Unicodeveloper\\Paystack\\Facades\\Paystack',
      'Datatables' => 'Yajra\\DataTables\\Facades\\DataTables',
    ),
  ),
  'auth' => 
  array (
    'defaults' => 
    array (
      'guard' => 'web',
      'passwords' => 'users',
    ),
    'guards' => 
    array (
      'web' => 
      array (
        'driver' => 'session',
        'provider' => 'users',
      ),
      'api' => 
      array (
        'driver' => 'passport',
        'provider' => 'users',
      ),
    ),
    'providers' => 
    array (
      'users' => 
      array (
        'driver' => 'eloquent',
        'model' => 'App\\User',
      ),
    ),
    'passwords' => 
    array (
      'users' => 
      array (
        'provider' => 'users',
        'table' => 'password_resets',
        'expire' => 60,
      ),
    ),
  ),
  'broadcasting' => 
  array (
    'default' => 'log',
    'connections' => 
    array (
      'pusher' => 
      array (
        'driver' => 'pusher',
        'key' => '',
        'secret' => '',
        'app_id' => '',
        'options' => 
        array (
        ),
      ),
      'redis' => 
      array (
        'driver' => 'redis',
        'connection' => 'default',
      ),
      'log' => 
      array (
        'driver' => 'log',
      ),
      'null' => 
      array (
        'driver' => 'null',
      ),
    ),
  ),
  'cache' => 
  array (
    'default' => 'file',
    'stores' => 
    array (
      'apc' => 
      array (
        'driver' => 'apc',
      ),
      'array' => 
      array (
        'driver' => 'array',
      ),
      'database' => 
      array (
        'driver' => 'database',
        'table' => 'cache',
        'connection' => NULL,
      ),
      'file' => 
      array (
        'driver' => 'file',
        'path' => '/var/www/html/dungthinh/nexthour/storage/framework/cache/data',
      ),
      'memcached' => 
      array (
        'driver' => 'memcached',
        'persistent_id' => NULL,
        'sasl' => 
        array (
          0 => NULL,
          1 => NULL,
        ),
        'options' => 
        array (
        ),
        'servers' => 
        array (
          0 => 
          array (
            'host' => '127.0.0.1',
            'port' => 11211,
            'weight' => 100,
          ),
        ),
      ),
      'redis' => 
      array (
        'driver' => 'redis',
        'connection' => 'default',
      ),
    ),
    'prefix' => 'laravel',
  ),
  'charts' => 
  array (
    'default' => 
    array (
      'type' => 'line',
      'library' => 'material',
      'element_label' => 'Element',
      'empty_dataset_label' => 'No Data Set',
      'empty_dataset_value' => 0,
      'title' => 'My Cool Chart',
      'height' => 400,
      'width' => 0,
      'responsive' => false,
      'background_color' => 'inherit',
      'colors' => 
      array (
      ),
      'one_color' => false,
      'template' => 'material',
      'legend' => true,
      'x_axis_title' => false,
      'y_axis_title' => NULL,
      'loader' => 
      array (
        'active' => true,
        'duration' => 500,
        'color' => '#000000',
      ),
    ),
    'templates' => 
    array (
      'material' => 
      array (
        0 => '#2196F3',
        1 => '#F44336',
        2 => '#FFC107',
      ),
      'red-material' => 
      array (
        0 => '#B71C1C',
        1 => '#F44336',
        2 => '#E57373',
      ),
      'indigo-material' => 
      array (
        0 => '#1A237E',
        1 => '#3F51B5',
        2 => '#7986CB',
      ),
      'blue-material' => 
      array (
        0 => '#0D47A1',
        1 => '#2196F3',
        2 => '#64B5F6',
      ),
      'teal-material' => 
      array (
        0 => '#004D40',
        1 => '#009688',
        2 => '#4DB6AC',
      ),
      'green-material' => 
      array (
        0 => '#1B5E20',
        1 => '#4CAF50',
        2 => '#81C784',
      ),
      'yellow-material' => 
      array (
        0 => '#F57F17',
        1 => '#FFEB3B',
        2 => '#FFF176',
      ),
      'orange-material' => 
      array (
        0 => '#E65100',
        1 => '#FF9800',
        2 => '#FFB74D',
      ),
    ),
    'assets' => 
    array (
      'global' => 
      array (
        'scripts' => 
        array (
          0 => 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js',
        ),
      ),
      'canvas-gauges' => 
      array (
        'scripts' => 
        array (
          0 => 'https://cdn.rawgit.com/Mikhus/canvas-gauges/gh-pages/download/2.1.2/all/gauge.min.js',
        ),
      ),
      'chartist' => 
      array (
        'scripts' => 
        array (
          0 => 'https://cdnjs.cloudflare.com/ajax/libs/chartist/0.10.1/chartist.min.js',
        ),
        'styles' => 
        array (
          0 => 'https://cdnjs.cloudflare.com/ajax/libs/chartist/0.10.1/chartist.min.css',
        ),
      ),
      'chartjs' => 
      array (
        'scripts' => 
        array (
          0 => 'https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js',
        ),
      ),
      'fusioncharts' => 
      array (
        'scripts' => 
        array (
          0 => 'https://static.fusioncharts.com/code/latest/fusioncharts.js',
          1 => 'https://static.fusioncharts.com/code/latest/themes/fusioncharts.theme.fint.js',
        ),
      ),
      'google' => 
      array (
        'scripts' => 
        array (
          0 => 'https://www.google.com/jsapi',
          1 => 'https://www.gstatic.com/charts/loader.js',
          2 => 'google.charts.load(\'current\', {\'packages\':[\'corechart\', \'gauge\', \'geochart\', \'bar\', \'line\']})',
        ),
      ),
      'highcharts' => 
      array (
        'styles' => 
        array (
        ),
        'scripts' => 
        array (
          0 => 'https://cdnjs.cloudflare.com/ajax/libs/highcharts/5.0.7/highcharts.js',
          1 => 'https://cdnjs.cloudflare.com/ajax/libs/highcharts/5.0.7/js/modules/offline-exporting.js',
          2 => 'https://cdnjs.cloudflare.com/ajax/libs/highmaps/5.0.7/js/modules/map.js',
          3 => 'https://cdnjs.cloudflare.com/ajax/libs/highmaps/5.0.7/js/modules/data.js',
          4 => 'https://code.highcharts.com/mapdata/custom/world.js',
        ),
      ),
      'justgage' => 
      array (
        'scripts' => 
        array (
          0 => 'https://cdnjs.cloudflare.com/ajax/libs/raphael/2.2.6/raphael.min.js',
          1 => 'https://cdnjs.cloudflare.com/ajax/libs/justgage/1.2.2/justgage.min.js',
        ),
      ),
      'morris' => 
      array (
        'styles' => 
        array (
          0 => 'https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css',
        ),
        'scripts' => 
        array (
          0 => 'https://cdnjs.cloudflare.com/ajax/libs/raphael/2.2.6/raphael.min.js',
          1 => 'https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js',
        ),
      ),
      'plottablejs' => 
      array (
        'scripts' => 
        array (
          0 => 'https://cdnjs.cloudflare.com/ajax/libs/d3/3.5.5/d3.min.js',
          1 => 'https://cdnjs.cloudflare.com/ajax/libs/plottable.js/2.8.0/plottable.min.js',
        ),
        'styles' => 
        array (
          0 => 'https://cdnjs.cloudflare.com/ajax/libs/plottable.js/2.2.0/plottable.css',
        ),
      ),
      'progressbarjs' => 
      array (
        'scripts' => 
        array (
          0 => 'https://cdnjs.cloudflare.com/ajax/libs/progressbar.js/1.0.1/progressbar.min.js',
        ),
      ),
      'c3' => 
      array (
        'scripts' => 
        array (
          0 => 'https://cdnjs.cloudflare.com/ajax/libs/d3/3.5.5/d3.min.js',
          1 => 'https://cdnjs.cloudflare.com/ajax/libs/c3/0.4.11/c3.min.js',
        ),
        'styles' => 
        array (
          0 => 'https://cdnjs.cloudflare.com/ajax/libs/c3/0.4.11/c3.min.css',
        ),
      ),
      'echarts' => 
      array (
        'scripts' => 
        array (
          0 => 'https://cdnjs.cloudflare.com/ajax/libs/echarts/3.6.2/echarts.min.js',
        ),
      ),
      'amcharts' => 
      array (
        'scripts' => 
        array (
          0 => 'https://cdnjs.cloudflare.com/ajax/libs/amcharts/3.21.2/amcharts.js',
          1 => 'https://cdnjs.cloudflare.com/ajax/libs/amcharts/3.21.2/serial.js',
          2 => 'https://cdnjs.cloudflare.com/ajax/libs/amcharts/3.21.2/plugins/export/export.min.js',
          3 => 'https://cdnjs.cloudflare.com/ajax/libs/amcharts/3.21.2/themes/light.js',
        ),
        'styles' => 
        array (
          0 => 'https://cdnjs.cloudflare.com/ajax/libs/amcharts/3.21.2/plugins/export/export.css',
        ),
      ),
    ),
    'default_library' => 'Chartjs',
  ),
  'cors' => 
  array (
    'supportsCredentials' => false,
    'allowedOrigins' => 
    array (
      0 => '*',
    ),
    'allowedOriginsPatterns' => 
    array (
    ),
    'allowedHeaders' => 
    array (
      0 => '*',
    ),
    'allowedMethods' => 
    array (
      0 => '*',
    ),
    'exposedHeaders' => 
    array (
    ),
    'maxAge' => 0,
  ),
  'database' => 
  array (
    'default' => 'mysql',
    'connections' => 
    array (
      'sqlite' => 
      array (
        'driver' => 'sqlite',
        'database' => 'nexthour',
        'prefix' => '',
      ),
      'mysql' => 
      array (
        'driver' => 'mysql',
        'host' => '127.0.0.1',
        'port' => '3306',
        'database' => 'nexthour',
        'username' => 'dungthinh',
        'password' => 'S01@wind6',
        'unix_socket' => '',
        'charset' => 'utf8mb4',
        'collation' => 'utf8mb4_unicode_ci',
        'prefix' => '',
        'strict' => true,
        'engine' => NULL,
      ),
      'tracker' => 
      array (
        'driver' => 'mysql',
        'host' => '127.0.0.1',
        'port' => '3306',
        'database' => 'nexthour',
        'username' => 'dungthinh',
        'password' => 'S01@wind6',
        'unix_socket' => '',
        'charset' => 'utf8mb4',
        'collation' => 'utf8mb4_unicode_ci',
        'prefix' => '',
        'strict' => false,
        'engine' => NULL,
      ),
      'pgsql' => 
      array (
        'driver' => 'pgsql',
        'host' => '127.0.0.1',
        'port' => '3306',
        'database' => 'nexthour',
        'username' => 'dungthinh',
        'password' => 'S01@wind6',
        'charset' => 'utf8',
        'prefix' => '',
        'schema' => 'public',
        'sslmode' => 'prefer',
      ),
      'sqlsrv' => 
      array (
        'driver' => 'sqlsrv',
        'host' => '127.0.0.1',
        'port' => '3306',
        'database' => 'nexthour',
        'username' => 'dungthinh',
        'password' => 'S01@wind6',
        'charset' => 'utf8',
        'prefix' => '',
      ),
    ),
    'migrations' => 'migrations',
    'redis' => 
    array (
      'client' => 'predis',
      'default' => 
      array (
        'host' => '127.0.0.1',
        'password' => NULL,
        'port' => '6379',
        'database' => 0,
      ),
    ),
  ),
  'datatables' => 
  array (
    'search' => 
    array (
      'smart' => true,
      'multi_term' => true,
      'case_insensitive' => true,
      'use_wildcards' => false,
    ),
    'index_column' => 'DT_RowIndex',
    'engines' => 
    array (
      'eloquent' => 'Yajra\\DataTables\\EloquentDataTable',
      'query' => 'Yajra\\DataTables\\QueryDataTable',
      'collection' => 'Yajra\\DataTables\\CollectionDataTable',
      'resource' => 'Yajra\\DataTables\\ApiResourceDataTable',
    ),
    'builders' => 
    array (
    ),
    'nulls_last_sql' => '%s %s NULLS LAST',
    'error' => NULL,
    'columns' => 
    array (
      'excess' => 
      array (
        0 => 'rn',
        1 => 'row_num',
      ),
      'escape' => '*',
      'raw' => 
      array (
        0 => 'action',
      ),
      'blacklist' => 
      array (
        0 => 'password',
        1 => 'remember_token',
      ),
      'whitelist' => '*',
    ),
    'json' => 
    array (
      'header' => 
      array (
      ),
      'options' => 0,
    ),
  ),
  'easynav' => 
  array (
    'default_class' => 'active',
  ),
  'eloquent-viewable' => 
  array (
    'models' => 
    array (
      'view' => 
      array (
        'table_name' => 'views',
        'connection' => 'mysql',
      ),
    ),
    'cache' => 
    array (
      'key' => 'cyrildewit.eloquent-viewable.cache',
      'store' => 'file',
      'lifetime_in_minutes' => 60,
    ),
    'session' => 
    array (
      'key' => 'cyrildewit.eloquent-viewable.session',
    ),
    'ignore_bots' => true,
    'honor_dnt' => false,
    'visitor_cookie_key' => 'eloquent_viewable',
    'ignored_ip_addresses' => 
    array (
    ),
  ),
  'filesystems' => 
  array (
    'default' => 'local',
    'cloud' => 's3',
    'disks' => 
    array (
      'local' => 
      array (
        'driver' => 'local',
        'root' => '/var/www/html/dungthinh/nexthour/storage/app',
      ),
      'public' => 
      array (
        'driver' => 'local',
        'root' => '/var/www/html/dungthinh/nexthour/storage/app/public',
        'url' => 'https://film.dungthinh.com/storage',
        'visibility' => 'public',
      ),
      'movies_upload' => 
      array (
        'driver' => 'local',
        'root' => '/var/www/html/dungthinh/nexthour/public/movies_upload',
        'url' => 'https://film.dungthinh.com/storage',
        'visibility' => 'public',
      ),
      'movie_360' => 
      array (
        'driver' => 'local',
        'root' => '/var/www/html/dungthinh/nexthour/public/movies_upload/movie_360',
        'url' => 'https://film.dungthinh.com/storage',
        'visibility' => 'public',
      ),
      'movie_480' => 
      array (
        'driver' => 'local',
        'root' => '/var/www/html/dungthinh/nexthour/public/movies_upload/movie_480',
        'url' => 'https://film.dungthinh.com/storage',
        'visibility' => 'public',
      ),
      'movie_720' => 
      array (
        'driver' => 'local',
        'root' => '/var/www/html/dungthinh/nexthour/public/movies_upload/movie_720',
        'url' => 'https://film.dungthinh.com/storage',
        'visibility' => 'public',
      ),
      'movie_1080' => 
      array (
        'driver' => 'local',
        'root' => '/var/www/html/dungthinh/nexthour/public/movies_upload/movie_1080',
        'url' => 'https://film.dungthinh.com/storage',
        'visibility' => 'public',
      ),
      'tvshow_upload' => 
      array (
        'driver' => 'local',
        'root' => '/var/www/html/dungthinh/nexthour/public/tvshow_upload',
        'url' => 'https://film.dungthinh.com/storage',
        'visibility' => 'public',
      ),
      'tv_360' => 
      array (
        'driver' => 'local',
        'root' => '/var/www/html/dungthinh/nexthour/public/tvshow_upload/tv_360',
        'url' => 'https://film.dungthinh.com/storage',
        'visibility' => 'public',
      ),
      'tv_480' => 
      array (
        'driver' => 'local',
        'root' => '/var/www/html/dungthinh/nexthour/public/tvshow_upload/tv_480',
        'url' => 'https://film.dungthinh.com/storage',
        'visibility' => 'public',
      ),
      'tv_720' => 
      array (
        'driver' => 'local',
        'root' => '/var/www/html/dungthinh/nexthour/public/tvshow_upload/tv_720',
        'url' => 'https://film.dungthinh.com/storage',
        'visibility' => 'public',
      ),
      'tv_1080' => 
      array (
        'driver' => 'local',
        'root' => '/var/www/html/dungthinh/nexthour/public/tvshow_upload/tv_1080',
        'url' => 'https://film.dungthinh.com/storage',
        'visibility' => 'public',
      ),
      'director_image_path' => 
      array (
        'driver' => 'local',
        'root' => '/var/www/html/dungthinh/nexthour/public/images/directors',
        'url' => 'https://film.dungthinh.com/storage',
        'visibility' => 'public',
      ),
      'actor_image_path' => 
      array (
        'driver' => 'local',
        'root' => '/var/www/html/dungthinh/nexthour/public/images/actors',
        'url' => 'https://film.dungthinh.com/storage',
        'visibility' => 'public',
      ),
      'imdb_poster_movie' => 
      array (
        'driver' => 'local',
        'root' => '/var/www/html/dungthinh/nexthour/public/images/movies/thumbnails',
        'url' => 'https://film.dungthinh.com/storage',
        'visibility' => 'public',
      ),
      'imdb_poster_episode' => 
      array (
        'driver' => 'local',
        'root' => '/var/www/html/dungthinh/nexthour/public/images/tvseries/episodes',
        'url' => 'https://film.dungthinh.com/storage',
        'visibility' => 'public',
      ),
      'imdb_backdrop_movie' => 
      array (
        'driver' => 'local',
        'root' => '/var/www/html/dungthinh/nexthour/public/images/movies/posters',
        'url' => 'https://film.dungthinh.com/storage',
        'visibility' => 'public',
      ),
      'imdb_poster_tv_series' => 
      array (
        'driver' => 'local',
        'root' => '/var/www/html/dungthinh/nexthour/public/images/tvseries/thumbnails',
        'url' => 'https://film.dungthinh.com/storage',
        'visibility' => 'public',
      ),
      'imdb_backdrop_tv_series' => 
      array (
        'driver' => 'local',
        'root' => '/var/www/html/dungthinh/nexthour/public/images/tvseries/posters',
        'url' => 'https://film.dungthinh.com/storage',
        'visibility' => 'public',
      ),
      's3' => 
      array (
        'driver' => 's3',
        'key' => '',
        'secret' => '',
        'region' => 'ap-south-1',
        'bucket' => '',
      ),
    ),
  ),
  'image-optimizer' => 
  array (
    'optimizers' => 
    array (
      'Spatie\\ImageOptimizer\\Optimizers\\Jpegoptim' => 
      array (
        0 => '-m85',
        1 => '--strip-all',
        2 => '--all-progressive',
      ),
      'Spatie\\ImageOptimizer\\Optimizers\\Pngquant' => 
      array (
        0 => '--force',
      ),
      'Spatie\\ImageOptimizer\\Optimizers\\Optipng' => 
      array (
        0 => '-i0',
        1 => '-o2',
        2 => '-quiet',
      ),
      'Spatie\\ImageOptimizer\\Optimizers\\Svgo' => 
      array (
        0 => '--disable=cleanupIDs',
      ),
      'Spatie\\ImageOptimizer\\Optimizers\\Gifsicle' => 
      array (
        0 => '-b',
        1 => '-O3',
      ),
    ),
    'timeout' => 60,
    'log_optimizer_activity' => false,
  ),
  'laravel-ffmpeg' => 
  array (
    'default_disk' => 'local',
    'ffmpeg' => 
    array (
      'binaries' => './vendor/pbmedia/laravel-ffmpeg/bin/ffmpeg.exe',
      'threads' => 12,
    ),
    'ffprobe' => 
    array (
      'binaries' => './vendor/pbmedia/laravel-ffmpeg/bin/ffprobe.exe',
    ),
    'timeout' => 3600,
  ),
  'laravel-page-speed' => 
  array (
    'enable' => true,
    'skip' => 
    array (
      0 => '*.xml',
      1 => '*.less',
      2 => '*.pdf',
      3 => '*.doc',
      4 => '*.txt',
      5 => '*.ico',
      6 => '*.rss',
      7 => '*.zip',
      8 => '*.mp3',
      9 => '*.rar',
      10 => '*.exe',
      11 => '*.wmv',
      12 => '*.doc',
      13 => '*.avi',
      14 => '*.ppt',
      15 => '*.mpg',
      16 => '*.mpeg',
      17 => '*.tif',
      18 => '*.wav',
      19 => '*.mov',
      20 => '*.psd',
      21 => '*.ai',
      22 => '*.xls',
      23 => '*.mp4',
      24 => '*.m4a',
      25 => '*.swf',
      26 => '*.dat',
      27 => '*.dmg',
      28 => '*.iso',
      29 => '*.flv',
      30 => '*.m4v',
      31 => '*.torrent',
    ),
  ),
  'mail' => 
  array (
    'driver' => '',
    'host' => '',
    'port' => '',
    'from' => 
    array (
      'address' => '',
      'name' => 'nexthour',
    ),
    'encryption' => '',
    'username' => '',
    'password' => '',
    'sendmail' => '/usr/sbin/sendmail -bs',
    'markdown' => 
    array (
      'theme' => 'default',
      'paths' => 
      array (
        0 => '/var/www/html/dungthinh/nexthour/resources/views/vendor/mail',
      ),
    ),
  ),
  'newsletter' => 
  array (
    'apiKey' => '',
    'defaultListName' => 'subscribers',
    'lists' => 
    array (
      'subscribers' => 
      array (
        'id' => '',
      ),
    ),
    'ssl' => true,
  ),
  'paypal' => 
  array (
    'client_id' => 'AaVbfEQM1f4_jQ9l1PZPAD6VjNYgNXi896eoKeuQgcNwig8vedlBQUBYiArhltf-YwZDwIE8F3P8wN3S',
    'secret' => 'EKSO7sI8F-uYrD8NDC_Wal3GUNjVAvnns9T_-FLniLzzkGtASOYXmOk4QjFKpG-IIjCX3Ha_PqppHZ_f',
    'settings' => 
    array (
      'mode' => 'live',
      'http.ConnectionTimeOut' => 90,
      'log.LogEnabled' => true,
      'log.FileName' => '/var/www/html/dungthinh/nexthour/storage/logs/paypal.log',
      'log.LogLevel' => 'FINE',
    ),
  ),
  'paystack' => 
  array (
    'publicKey' => '',
    'secretKey' => '',
    'paymentUrl' => '',
    'merchantEmail' => '',
  ),
  'payu' => 
  array (
    'required_fields' => 
    array (
      0 => 'txnid',
      1 => 'amount',
      2 => 'productinfo',
      3 => 'firstname',
      4 => 'email',
      5 => 'phone',
    ),
    'optional_fields' => 
    array (
      0 => 'udf1',
      1 => 'udf2',
      2 => 'udf3',
      3 => 'udf4',
      4 => 'udf5',
      5 => 'udf6',
      6 => 'udf7',
      7 => 'udf8',
      8 => 'udf9',
      9 => 'udf10',
    ),
    'additional_fields' => 
    array (
      0 => 'lastname',
      1 => 'address1',
      2 => 'address2',
      3 => 'city',
      4 => 'state',
      5 => 'country',
      6 => 'zipcode',
    ),
    'endpoint' => 'payu.in/_payment',
    'redirect' => 
    array (
      'surl' => 'tzsk/payment/success',
      'furl' => 'tzsk/payment/failed',
    ),
    'env' => '',
    'default' => '',
    'accounts' => 
    array (
      'payubiz' => 
      array (
        'key' => '',
        'salt' => '',
        'money' => false,
        'auth' => NULL,
      ),
      'payumoney' => 
      array (
        'key' => '',
        'salt' => '',
        'money' => true,
        'auth' => NULL,
      ),
    ),
    'driver' => 'session',
    'table' => 'payu_payments',
  ),
  'permission' => 
  array (
    'models' => 
    array (
      'permission' => 'Spatie\\Permission\\Models\\Permission',
      'role' => 'Spatie\\Permission\\Models\\Role',
    ),
    'table_names' => 
    array (
      'roles' => 'roles',
      'permissions' => 'permissions',
      'model_has_permissions' => 'model_has_permissions',
      'model_has_roles' => 'model_has_roles',
      'role_has_permissions' => 'role_has_permissions',
    ),
    'column_names' => 
    array (
      'model_morph_key' => 'model_id',
    ),
    'display_permission_in_exception' => false,
    'cache' => 
    array (
      'expiration_time' => 
      DateInterval::__set_state(array(
         'y' => 0,
         'm' => 0,
         'd' => 0,
         'h' => 24,
         'i' => 0,
         's' => 0,
         'f' => 0.0,
         'weekday' => 0,
         'weekday_behavior' => 0,
         'first_last_day_of' => 0,
         'invert' => 0,
         'days' => false,
         'special_type' => 0,
         'special_amount' => 0,
         'have_weekday_relative' => 0,
         'have_special_relative' => 0,
      )),
      'key' => 'spatie.permission.cache',
      'model_key' => 'name',
      'store' => 'default',
    ),
    'cache_expiration_time' => 1440,
  ),
  'queue' => 
  array (
    'default' => 'database',
    'connections' => 
    array (
      'sync' => 
      array (
        'driver' => 'sync',
      ),
      'database' => 
      array (
        'driver' => 'database',
        'table' => 'jobs',
        'queue' => 'default',
        'retry_after' => 20000,
      ),
      'beanstalkd' => 
      array (
        'driver' => 'beanstalkd',
        'host' => 'localhost',
        'queue' => 'default',
        'retry_after' => 20000,
      ),
      'sqs' => 
      array (
        'driver' => 'sqs',
        'key' => 'your-public-key',
        'secret' => 'your-secret-key',
        'prefix' => 'https://sqs.us-east-1.amazonaws.com/your-account-id',
        'queue' => 'your-queue-name',
        'region' => 'us-east-1',
      ),
      'redis' => 
      array (
        'driver' => 'redis',
        'connection' => 'default',
        'queue' => 'default',
        'retry_after' => 90,
      ),
    ),
    'failed' => 
    array (
      'database' => 'mysql',
      'table' => 'failed_jobs',
    ),
  ),
  'services' => 
  array (
    'mailgun' => 
    array (
      'domain' => NULL,
      'secret' => NULL,
    ),
    'ses' => 
    array (
      'key' => NULL,
      'secret' => NULL,
      'region' => 'us-east-1',
    ),
    'sparkpost' => 
    array (
      'secret' => NULL,
    ),
    'stripe' => 
    array (
      'model' => 'App\\User',
      'key' => '',
      'secret' => '',
    ),
    'facebook' => 
    array (
      'client_id' => NULL,
      'client_secret' => NULL,
      'redirect' => NULL,
    ),
    'google' => 
    array (
      'client_id' => NULL,
      'client_secret' => NULL,
      'redirect' => NULL,
    ),
    'gitlab' => 
    array (
      'client_id' => '',
      'client_secret' => '',
      'redirect' => NULL,
    ),
  ),
  'session' => 
  array (
    'driver' => 'file',
    'lifetime' => 120,
    'expire_on_close' => false,
    'encrypt' => false,
    'files' => '/var/www/html/dungthinh/nexthour/storage/framework/sessions',
    'connection' => NULL,
    'table' => 'sessions',
    'store' => NULL,
    'lottery' => 
    array (
      0 => 2,
      1 => 100,
    ),
    'cookie' => 'phimhay_session',
    'path' => '/',
    'domain' => NULL,
    'secure' => false,
    'http_only' => true,
    'same_site' => NULL,
  ),
  'tracker' => 
  array (
    'enabled' => false,
    'cache_enabled' => true,
    'use_middleware' => false,
    'do_not_track_robots' => false,
    'do_not_track_environments' => 
    array (
    ),
    'do_not_track_routes' => 
    array (
      0 => 'tracker.stats.*',
    ),
    'do_not_track_paths' => 
    array (
      0 => 'api/*',
    ),
    'do_not_track_ips' => 
    array (
    ),
    'log_untrackable_sessions' => true,
    'log_enabled' => true,
    'console_log_enabled' => false,
    'log_sql_queries' => false,
    'connection' => 'tracker',
    'do_not_log_sql_queries_connections' => 
    array (
      0 => 'tracker',
    ),
    'geoip_database_path' => '/var/www/html/dungthinh/nexthour/config/geoip',
    'log_sql_queries_bindings' => false,
    'log_events' => true,
    'log_only_events' => 
    array (
    ),
    'id_columns_names' => 
    array (
      0 => 'id',
    ),
    'do_not_log_events' => 
    array (
      0 => 'illuminate.log',
      1 => 'eloquent.*',
      2 => 'router.*',
      3 => 'composing: *',
      4 => 'creating: *',
    ),
    'log_geoip' => true,
    'log_user_agents' => true,
    'log_users' => true,
    'log_devices' => true,
    'log_languages' => true,
    'log_referers' => true,
    'log_paths' => true,
    'log_queries' => true,
    'log_routes' => true,
    'log_exceptions' => true,
    'store_cookie_tracker' => true,
    'tracker_cookie_name' => 'tracker_cookie',
    'tracker_session_name' => 'tracker_session',
    'user_model' => 'PragmaRX\\Tracker\\Vendor\\Laravel\\Models\\User',
    'session_model' => 'PragmaRX\\Tracker\\Vendor\\Laravel\\Models\\Session',
    'log_model' => 'PragmaRX\\Tracker\\Vendor\\Laravel\\Models\\Log',
    'path_model' => 'PragmaRX\\Tracker\\Vendor\\Laravel\\Models\\Path',
    'query_model' => 'PragmaRX\\Tracker\\Vendor\\Laravel\\Models\\Query',
    'query_argument_model' => 'PragmaRX\\Tracker\\Vendor\\Laravel\\Models\\QueryArgument',
    'agent_model' => 'PragmaRX\\Tracker\\Vendor\\Laravel\\Models\\Agent',
    'device_model' => 'PragmaRX\\Tracker\\Vendor\\Laravel\\Models\\Device',
    'cookie_model' => 'PragmaRX\\Tracker\\Vendor\\Laravel\\Models\\Cookie',
    'domain_model' => 'PragmaRX\\Tracker\\Vendor\\Laravel\\Models\\Domain',
    'referer_model' => 'PragmaRX\\Tracker\\Vendor\\Laravel\\Models\\Referer',
    'referer_search_term_model' => 'PragmaRX\\Tracker\\Vendor\\Laravel\\Models\\RefererSearchTerm',
    'route_model' => 'PragmaRX\\Tracker\\Vendor\\Laravel\\Models\\Route',
    'route_path_model' => 'PragmaRX\\Tracker\\Vendor\\Laravel\\Models\\RoutePath',
    'route_path_parameter_model' => 'PragmaRX\\Tracker\\Vendor\\Laravel\\Models\\RoutePathParameter',
    'error_model' => 'PragmaRX\\Tracker\\Vendor\\Laravel\\Models\\Error',
    'geoip_model' => 'PragmaRX\\Tracker\\Vendor\\Laravel\\Models\\GeoIp',
    'sql_query_model' => 'PragmaRX\\Tracker\\Vendor\\Laravel\\Models\\SqlQuery',
    'sql_query_binding_model' => 'PragmaRX\\Tracker\\Vendor\\Laravel\\Models\\SqlQueryBinding',
    'sql_query_binding_parameter_model' => 'PragmaRX\\Tracker\\Vendor\\Laravel\\Models\\SqlQueryBindingParameter',
    'sql_query_log_model' => 'PragmaRX\\Tracker\\Vendor\\Laravel\\Models\\SqlQueryLog',
    'connection_model' => 'PragmaRX\\Tracker\\Vendor\\Laravel\\Models\\Connection',
    'event_model' => 'PragmaRX\\Tracker\\Vendor\\Laravel\\Models\\Event',
    'event_log_model' => 'PragmaRX\\Tracker\\Vendor\\Laravel\\Models\\EventLog',
    'system_class_model' => 'PragmaRX\\Tracker\\Vendor\\Laravel\\Models\\SystemClass',
    'language_model' => 'PragmaRX\\Tracker\\Vendor\\Laravel\\Models\\Language',
    'authentication_ioc_binding' => 
    array (
      0 => 'auth',
    ),
    'authentication_guards' => 
    array (
    ),
    'authenticated_check_method' => 'check',
    'authenticated_user_method' => 'user',
    'authenticated_user_id_column' => 'id',
    'authenticated_user_username_column' => 'email',
    'stats_panel_enabled' => false,
    'stats_routes_before_filter' => '',
    'stats_routes_after_filter' => '',
    'stats_routes_middleware' => 'web',
    'stats_template_path' => '/templates/sb-admin-2',
    'stats_base_uri' => 'stats',
    'stats_layout' => 'pragmarx/tracker::layout',
    'stats_controllers_namespace' => 'PragmaRX\\Tracker\\Vendor\\Laravel\\Controllers',
  ),
  'translatable' => 
  array (
    'fallback_locale' => 'en',
  ),
  'view' => 
  array (
    'paths' => 
    array (
      0 => '/var/www/html/dungthinh/nexthour/resources/views',
    ),
    'compiled' => '/var/www/html/dungthinh/nexthour/storage/framework/views',
  ),
  'vimeo' => 
  array (
    'default' => 'main',
    'connections' => 
    array (
      'main' => 
      array (
        'client_id' => '',
        'client_secret' => '',
        'access_token' => '',
      ),
      'alternative' => 
      array (
        'client_id' => 'your-alt-client-id',
        'client_secret' => 'your-alt-client-secret',
        'access_token' => NULL,
      ),
    ),
  ),
  'youtube' => 
  array (
    'key' => 'AIzaSyBnGYmIRa5x92GhpPN5OcBaFhNqNVeo3gY',
  ),
  'image' => 
  array (
    'driver' => 'gd',
  ),
  'passport' => 
  array (
    'private_key' => NULL,
    'public_key' => NULL,
  ),
  'coinpayments' => 
  array (
    'database_prefix' => 'cp_',
    'merchant_id' => '',
    'public_key' => '',
    'private_key' => '',
    'ipn_secret' => '',
    'ipn_url' => 'https://localhost/public/coinpayment/callback',
    'format' => 'json',
    'log_level' => 1,
    'route' => 
    array (
      'enabled' => true,
      'path' => '/api/ipn',
    ),
  ),
  'trustedproxy' => 
  array (
    'proxies' => NULL,
    'headers' => 30,
  ),
  'tinker' => 
  array (
    'commands' => 
    array (
    ),
    'dont_alias' => 
    array (
      0 => 'App\\Nova',
    ),
  ),
);
