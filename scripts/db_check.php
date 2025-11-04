<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$status = $kernel->handle(
    $input = new Symfony\Component\Console\Input\ArgvInput(),
    new Symfony\Component\Console\Output\BufferedOutput()
);

use Illuminate\Support\Facades\DB;
use App\Models\Skill;
use App\Models\Project;
use App\Models\BlogPost;

echo "Checking database contents...\n";
try {
    $skillCount = Skill::count();
    $projectCount = Project::count();
    $postCount = BlogPost::count();
    echo "skills:" . $skillCount . "\n";
    echo "projects:" . $projectCount . "\n";
    echo "posts:" . $postCount . "\n";
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}

$kernel->terminate($input, $status);
