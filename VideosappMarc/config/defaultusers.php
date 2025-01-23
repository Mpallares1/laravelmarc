<?php

return [
    'user' => [
        'name' => env("USER_NAME", "UserDefault"),
        'email' => env("USER_EMAIL", "user@example.com"),
        'password' => env("USER_PASSWORD", "contra1234"),
        'current_team_id' => env("USER_TEAM_ID", null),
    ],
    'professor' => [
        'name' => env("PROFESSOR_NAME", "ProfessorDefault"),
        'email' => env("PROFESSOR_EMAIL", "professor@example.com"),
        'password' => env("USER_PASSWORD", "contra1234"),
        'current_team_id' => env("PROFESSOR_TEAM_ID", null),
    ],
    'team' => [
        'name_suffix' => "'s Team",
    ],
];
