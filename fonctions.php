<?php
// functions.php

function isValidRecipe(array $recipe) : bool
{
    if (array_key_exists('is_enabled', $recipe)) {
        $isEnabled = $recipe['is_enabled'];
    } else {
        $isEnabled = false;
    }

    return $isEnabled;
}

function displayAuthor(string $authorEmail, array $users) : string
{
    for ($i = 0; $i < count($users); $i++) {
        $author = $users[$i];
        if ($authorEmail === $author['email']) {
            return $author['full_name'] . '(' . $author['age'] . ' ans)';
        }
    }

    return 'Non trouvé';
}

function getRecipes(array $recipes) : array
{
    $validRecipes = [];

    foreach($recipes as $recipe) {
        if (isValidRecipe($recipe)) {
            $validRecipes[] = $recipe;
        }
    }

    return $validRecipes;
}

function retrieve_id_from_user_mail(string $userEmail , array $users) : int
{
    for( $i=0 ; $i<count($users); $î++ )
    {
      $user=$users[$i];
      if($userEmail == $user['email'])
      {
        return $user['user_id'];
      }
    }
    return 0;
}

function display_user(int $userId, array $users) : string
{
    for ($i = 0; $i < count($users); $i++) {
        $user = $users[$i];
        if ($userId === (int) $user['user_id']) {
            return $user['full_name'] . '(' . $user['age'] . ' ans)';
        }
    }

    return 'Non trouvé.';
}