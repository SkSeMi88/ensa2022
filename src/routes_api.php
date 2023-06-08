<?php

return [
    '~^articles/(\d+)$~' => [\MyProject\Controllers\Api\ArticlesApiController::class, 'view'],
    '~^articles/add$~' => [\MyProject\Controllers\Api\ArticlesApiController::class, 'add'],
    '~^poisk/filtr$~' => [\MyProject\Controllers\Api\PoiskApiController::class, 'filtr'],
<<<<<<< HEAD
    '~^test/test$~' => [\MyProject\Controllers\Api\PoiskApiController::class, 'test'],
=======
>>>>>>> a30208e1742a64943574920e2df4fe8fc7726c92
];