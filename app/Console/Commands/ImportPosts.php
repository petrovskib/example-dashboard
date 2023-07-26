<?php

namespace App\Console\Commands;

use App\Models\Post;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class ImportPosts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:import-posts';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import Posts  ';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $started_at = now();

        $url = config('app.external_url');
        $response = Http::get($url);

        if ($response->failed() || $response->clientError() || $response->serverError()) {
            $this->info("Error: The server at url responded with error!");
            return;
        }

        // Let's iterate over each post of the data returned to be imported.
        $postToImport = $response->json();
        foreach ($postToImport['data'] as $post) {

            $importedPost = Post::make($post);
            $importedPost->save();
            $this->info("Imported post: {{$post['title']}}");
        }

        $this->info("Import done.");
    }
}
