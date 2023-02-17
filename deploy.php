<?php
namespace Deployer;

require 'recipe/laravel.php';

// Config

set('repository', 'git@github.com:Naythankik/3ird.git');

add('shared_files', []);
add('shared_dirs', []);
add('writable_dirs', []);

// Hosts

host('3ird-fhy8aitlf-naythankik.vercel.app')
    ->set('remote_user', 'deployer')
    ->set('deploy_path', '~/3ird');

// Hooks

after('deploy:failed', 'deploy:unlock');
