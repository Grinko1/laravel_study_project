<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Components\ImportDataClient;
use App\Models\Post;

class ImportJsonCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:jsonplaceholder';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get data from jsonplaceholder';

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
        $import = new ImportDataClient();
        $response  = $import->client->request('GET', 'posts');
       
        $data =json_decode($response->getBody()->getContents());
      
        foreach ($data as $item) {
           Post::firstOrCreate([
               'title' => $item->title
           ],[
            'title' =>$item->title,
            'content' => $item->body,
            'category_id' =>2
           ]);
        }
    }
}
