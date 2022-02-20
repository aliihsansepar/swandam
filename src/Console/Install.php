<?php

namespace Swandam\Core\Console;

use \Illuminate\Console\Command;
use Illuminate\Support\Str;

class Install extends Command
{
    protected $hidden = true;
    protected $signature = 'swandam:install';

    protected $description = 'Install the Swandam package requirements';


    public function handle()
    {
        $this->blackList();
    }

    private function blackList()
    {
        $file = base_path('config' . DIRECTORY_SEPARATOR . 'app.php');
        $config = file_get_contents($file);

        $blacklist = '
                \'debug_blacklist\' => [
                    \'_ENV\' => array_keys( $_ENV ),
                    \'_SERVER\' => array_keys( $_SERVER ),
                    \'_POST\' => array_keys( $_POST ),
                    \'_GET\' => array_keys( $_GET ),
                    \'_COOKIE\' => array_keys( $_COOKIE ),
                ],
            ];';

        if (!Str::contains($config, "'debug_blacklist'")) {
            $config = str_replace('];', $blacklist, $config);
            file_put_contents($file, $config);
        }
        $this->info("Blacklist is adjusted.");
    }
}