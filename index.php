<?php

include 'vendor/autoload.php';

use \models\User;
use \models\Vote;

$user = (new User);
$vote = (new Vote);

$lastInsertId = $user->create([
    'name' => 'Valeria',
    'last_name' => 'Goris Payano',
    'Unapc2015'
]);

$accounts = $user->all();

while ($account = $accounts->fetchObject())
{
    $name = $account->name;

    $lastInsertId = $vote->create([
        'user_id' => $account->id
    ]);

    echo "<p>Vote #{$lastInsertId} from user {$name} was added. </p>";
}

echo "<p>Votes: {$vote->count()}</p>";
echo "<p>Users: {$user->count()}</p>";
