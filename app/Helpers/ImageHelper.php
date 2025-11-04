<?php

if (!function_exists('profile_image')) {

    // Profile Image
    function profile_image($filename = 'avatar.png', $default = null)
    {
        $path = "images/profile/{$filename}";
        
        if (file_exists(public_path($path))) {
            return asset($path);
        }
        
        // Fallback to default or placeholder
        return $default ?: "https://via.placeholder.com/150/667eea/ffffff?text=" . urlencode(config('app.name', 'User'));
    }
}

if (!function_exists('portfolio_image')) {
    // Portfolio Project Image
    function portfolio_image($project, $filename = 'thumbnail.jpg')
{
    $project = preg_replace('/[^a-zA-Z0-9_-]/', '', $project);
    $path = "images/portfolio/{$project}/{$filename}";
    
    if (file_exists(public_path($path))) {
        return asset($path);
    }
    return "https://via.placeholder.com/400x250/667eea/ffffff?text=" . urlencode($project);
    }
}

if (!function_exists('blog_image')) {
    // Blog Post Image
    function blog_image($filename, $width = 400, $height = 250)
    {
        $path = "images/blog/{$filename}";
        
        if (file_exists(public_path($path))) {
            return asset($path);
        }
        
        // Fallback to placeholder
        return "https://via.placeholder.com/{$width}x{$height}/764ba2/ffffff?text=Blog+Image";
    }
}

if (!function_exists('skill_icon')) {
    function skill_icon($skill)
{
    $skill = strtolower(preg_replace('/[^a-zA-Z0-9_-]/', '', $skill));
    $iconPath = "images/icons/skills/{$skill}.svg";
    
    if (file_exists(public_path($iconPath))) {
        return asset($iconPath);
    }
    
    $fontAwesome = [
        'laravel' => 'fab fa-laravel',
        'php' => 'fab fa-php',
        'javascript' => 'fab fa-js-square',
        'react' => 'fab fa-react',
        'vue' => 'fab fa-vuejs',
        'html' => 'fab fa-html5',
        'css' => 'fab fa-css3-alt',
        'github' => 'fab fa-github',
        'docker' => 'fab fa-docker',
        'node' => 'fab fa-node-js',
    ];
    
    return $fontAwesome[$skill] ?? 'fas fa-code';
}
}