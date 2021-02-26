<?php

namespace Swtysweater\Yacrudg\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use App\Models\Cruds;

class YacrudgRemove extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'yacrudg:remove {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Remove CRUD for table';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */

    
    public function handle()
    {
        $name = $this->argument('name');
        Cruds::where('tablename', '=', Str::plural(strtolower($name)))->delete();
        File::delete(app_path("/Http/Controllers/{$name}Controller.php"));
        File::delete(app_path("/Models/{$name}.php"));
        File::delete(app_path("/Http/Requests/{$name}Request.php"));
        $this->info('CRUD for '.Str::plural(strtolower($name)).' is successfully created!');
    }
}
