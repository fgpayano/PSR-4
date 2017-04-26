<?php

include 'vendor/autoload.php';

use \models\User;
use \models\Vote;

$db = \models\DB::create();

$user = (new User($db));
$vote = (new Vote($db));

$lastInsertId = $user->create([
    'name' => 'Valeria',
    'last_name' => 'Goris Payano',
    'password' => 'Unapc2015'
]);

$lastInsertId = $user->create([
    'name' => 'Francis',
    'last_name' => 'Goris Payano',
    'password' => 'Unapc2015'
]);

$accounts = $user->all();

foreach ($accounts as $account)
{
    $name = $account->name;

    $lastInsertId = $vote->create([
        'user_id' => $account->id
    ]);

    echo "<p>Vote #{$lastInsertId} from user {$name} was added. </p>";
}

echo "<p>Votes: {$vote->count()}</p>";
echo "<p>Users: {$user->count()}</p>";
