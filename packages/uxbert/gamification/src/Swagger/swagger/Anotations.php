<?php

/**
 * @OA\Info(
 *      version="1.0.0",
 *      title="Jazeel ",
 *      description="Jazeel integration system",
 *      @OA\Contact(
 *          email="info@uxbert.com"
 *      ),
 *     @OA\License(
 *         name="Uxbert",
 *         url="http://uxbert.com"
 *     )
 * )
 */

/**
 * @OA\Server(
 *      url="https://jazeel-backend.halayalla.com/api",
 *      description="Testing Server"
 * )
 *

 */

/**
 * @OA\SecurityScheme(
 *     type="oauth2",
 *     description="Use a global client_id / client_secret and your username / password combo to obtain a token",
 *     name="Password Based",
 *     in="header",
 *     scheme="https",
 *     securityScheme="Password Based",
 *     @OA\Flow(
 *         flow="password",
 *         authorizationUrl="/oauth/authorize",
 *         tokenUrl="/oauth/token",
 *         refreshUrl="/oauth/token/refresh",
 *         scopes={}
 *     )
 * )
 */

/**
 *
 * @OA\Tag(
 *     name="Brand's Operations Api",
 *     description="Operations about brand",
 * )
 *
 * @OA\Tag(
 *     name="Brand's Settings Api",
 *     description="Settings about brand",
 * )
 */
