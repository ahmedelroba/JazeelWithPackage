<?php



/**
 * @OA\Post(
 *     path="/create_new_user",
 *     tags={"Brand's Operations Api"},
 *     summary="You can create a new user for any brand by client_id and client_secret.",
 *     operationId="createBrandsUser",
 *      @OA\RequestBody(
 *         @OA\MediaType(
 *             mediaType="application/x-www-form-urlencoded",
 *             @OA\Schema(
 *                 @OA\Property(property="client_id", type="string", description="Unique brand id."),
 *                 @OA\Property(property="client_secret", type="string", description="Unique brand secret."),
 *                 @OA\Property(property="first_name", type="string", description="First name of brand's user."),
 *                 @OA\Property(property="last_name", type="string", description="Last name name of brand's user."),
 *                 @OA\Property(property="email", type="string", description="Brand's user email address for login by it in jazeel."),
 *                 @OA\Property(property="password", type="string", description="Brand's user password for login by it in jazeel."),
 *                 @OA\Property(property="phone", type="string", description="Phone number of brand's user but must be starting by 05."),
 *                 @OA\Property(property="city", type="string", description="City of brand's user."),
 *                 @OA\Property(property="country", type="string", description="Country of brand's user."),
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Success",
 *         @OA\JsonContent(
 *             type="string"
 *         ),
 *     ),
 *     @OA\Response(
 *         response=422,
 *         description="Validation error",
 *         @OA\JsonContent(
 *             type="string"
 *         ),
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Cutom error message",
 *         @OA\JsonContent(
 *             type="string"
 *         ),
 *     ),
 *     security={
 *         {"petstore_auth": {"write:pets", "read:pets"}}
 *     },
 * )
 */

/**
 * @OA\Post(
 *     path="/add_action_for_user",
 *     tags={"Brand's Operations Api"},
 *     summary="Brands can add lot of actions for users for give them points and make users history.",
 *     operationId="createBrandsUserAction",
 *      @OA\RequestBody(
 *         @OA\MediaType(
 *             mediaType="application/x-www-form-urlencoded",
 *             @OA\Schema(
 *                 @OA\Property(property="client_id", type="string", description="Unique brand id."),
 *                 @OA\Property(property="client_secret", type="string", description="Unique brand secret."),
 *                 @OA\Property(property="user_referral_key", type="string", description="Brand's user referral key, it saved in jazeel when user created."),
 *                 @OA\Property(property="action_key", type="string", description="Brand's action key (Static key)."),
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Success",
 *         @OA\JsonContent(
 *             type="string"
 *         ),
 *     ),
 *     @OA\Response(
 *         response=422,
 *         description="Validation error",
 *         @OA\JsonContent(
 *             type="string"
 *         ),
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Cutom error message",
 *         @OA\JsonContent(
 *             type="string"
 *         ),
 *     ),
 *     security={
 *         {"petstore_auth": {"write:pets", "read:pets"}}
 *     },
 * )
 */

/**
 * @OA\Post(
 *     path="/add_new_brand_action",
 *     tags={"Brand's Settings Api"},
 *     summary="You can add a new brand action to help brands tracking user points by client_id and client_secret.",
 *     operationId="addBrandAction",
 *      @OA\RequestBody(
 *         @OA\MediaType(
 *             mediaType="application/x-www-form-urlencoded",
 *             @OA\Schema(
 *                 @OA\Property(property="client_id", type="string", description="Unique brand id."),
 *                 @OA\Property(property="client_secret", type="string", description="Unique brand secret."),
 *                 @OA\Property(property="name", type="string", description="Name of brand action."),
 *                 @OA\Property(property="description", type="string", description="Description of brand action."),
 *                 @OA\Property(property="points", type="integer", description="Total points of this action."),
 *                 @OA\Property(property="key", type="string", description="You must be add unique key for every action for you will using it in every time."),
 *                 @OA\Property(property="type", type="string", description="You must write type of action 'minus' or 'plus'."),
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Success",
 *         @OA\JsonContent(
 *             type="string"
 *         ),
 *     ),
 *     @OA\Response(
 *         response=422,
 *         description="Validation error",
 *         @OA\JsonContent(
 *             type="string"
 *         ),
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Cutom error message",
 *         @OA\JsonContent(
 *             type="string"
 *         ),
 *     ),
 *     security={
 *         {"petstore_auth": {"write:pets", "read:pets"}}
 *     },
 * )
 */


/**
 * @OA\Post(
 *     path="/brand_actions_list",
 *     tags={"Brand's Settings Api"},
 *     summary="Any brand can get a list of all it’s Actions by client_id and client_secret.",
 *     operationId="addBrandAction",
 *      @OA\RequestBody(
 *         @OA\MediaType(
 *             mediaType="application/x-www-form-urlencoded",
 *             @OA\Schema(
 *                 @OA\Property(property="client_id", type="string", description="Unique brand id."),
 *                 @OA\Property(property="client_secret", type="string", description="Unique brand secret."),
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Success",
 *         @OA\JsonContent(
 *             type="string"
 *         ),
 *     ),
 *     @OA\Response(
 *         response=422,
 *         description="Validation error",
 *         @OA\JsonContent(
 *             type="string"
 *         ),
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Cutom error message",
 *         @OA\JsonContent(
 *             type="string"
 *         ),
 *     ),
 *     security={
 *         {"petstore_auth": {"write:pets", "read:pets"}}
 *     },
 * )
 */



/**
 * @OA\Post(
 *     path="/show_all_points_of_user",
 *     tags={"Brand's Operations Api"},
 *     summary="Show all brand's users points counts.",
 *     operationId="showUserPointCounters",
 *      @OA\RequestBody(
 *         @OA\MediaType(
 *             mediaType="application/x-www-form-urlencoded",
 *             @OA\Schema(
 *                 @OA\Property(property="client_id",       type="string", description="Unique brand id."),
 *                 @OA\Property(property="client_secret",   type="string", description="Unique brand secret."),
 *                 @OA\Property(property="user_referral_key",         type="string", description="Brand's user referral key, it saved in jazeel when user created."),
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Success",
 *         @OA\JsonContent(
 *             type="string"
 *         ),
 *     ),
 *     @OA\Response(
 *         response=422,
 *         description="Validation error",
 *         @OA\JsonContent(
 *             type="string"
 *         ),
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Cutom error message",
 *         @OA\JsonContent(
 *             type="string"
 *         ),
 *     ),
 *     security={
 *         {"petstore_auth": {"write:pets", "read:pets"}}
 *     },
 * )
 */



/**
 * @OA\Post(
 *     path="/show_all_points_of_user_history",
 *     tags={"Brand's Operations Api"},
 *     summary="Show all brand's users points history.",
 *     operationId="showUserPointsHistory",
 *      @OA\RequestBody(
 *         @OA\MediaType(
 *             mediaType="application/x-www-form-urlencoded",
 *             @OA\Schema(
 *                 @OA\Property(property="client_id",       type="string", description="Unique brand id."),
 *                 @OA\Property(property="client_secret",   type="string", description="Unique brand secret."),
 *                 @OA\Property(property="user_referral_key",         type="string", description="Brand's user referral key, it saved in jazeel when user created."),
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Success",
 *         @OA\JsonContent(
 *             type="string"
 *         ),
 *     ),
 *     @OA\Response(
 *         response=422,
 *         description="Validation error",
 *         @OA\JsonContent(
 *             type="string"
 *         ),
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Cutom error message",
 *         @OA\JsonContent(
 *             type="string"
 *         ),
 *     ),
 *     security={
 *         {"petstore_auth": {"write:pets", "read:pets"}}
 *     },
 * )
 */



/**
 * @OA\Post(
 *     path="/top_users_have_points",
 *     tags={"Brand's Operations Api"},
 *     summary="Show Top brand's users have points.",
 *     operationId="topUsersHavePoints",
 *      @OA\RequestBody(
 *         @OA\MediaType(
 *             mediaType="application/x-www-form-urlencoded",
 *             @OA\Schema(
 *                 @OA\Property(property="client_id",       type="string", description="Unique brand id."),
 *                 @OA\Property(property="client_secret",   type="string", description="Unique brand secret."),
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Success",
 *         @OA\JsonContent(
 *             type="string"
 *         ),
 *     ),
 *     @OA\Response(
 *         response=422,
 *         description="Validation error",
 *         @OA\JsonContent(
 *             type="string"
 *         ),
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Cutom error message",
 *         @OA\JsonContent(
 *             type="string"
 *         ),
 *     ),
 *     security={
 *         {"petstore_auth": {"write:pets", "read:pets"}}
 *     },
 * )
 */




/**
 * @OA\Post(
 *     path="/top_users_got_points",
 *     tags={"Brand's Operations Api"},
 *     summary="Show Top brand's users got points.",
 *     operationId="topUsersHavePoints",
 *      @OA\RequestBody(
 *         @OA\MediaType(
 *             mediaType="application/x-www-form-urlencoded",
 *             @OA\Schema(
 *                 @OA\Property(property="client_id",       type="string", description="Unique brand id."),
 *                 @OA\Property(property="client_secret",   type="string", description="Unique brand secret."),
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Success",
 *         @OA\JsonContent(
 *             type="string"
 *         ),
 *     ),
 *     @OA\Response(
 *         response=422,
 *         description="Validation error",
 *         @OA\JsonContent(
 *             type="string"
 *         ),
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Cutom error message",
 *         @OA\JsonContent(
 *             type="string"
 *         ),
 *     ),
 *     security={
 *         {"petstore_auth": {"write:pets", "read:pets"}}
 *     },
 * )
 */




/**
 * @OA\Post(
 *     path="/top_users_by_brand_action",
 *     tags={"Brand's Operations Api"},
 *     summary="Show Top brand's users got points.",
 *     operationId="topUsersHavePoints",
 *      @OA\RequestBody(
 *         @OA\MediaType(
 *             mediaType="application/x-www-form-urlencoded",
 *             @OA\Schema(
 *                 @OA\Property(property="client_id",       type="string", description="Unique brand id."),
 *                 @OA\Property(property="client_secret",   type="string", description="Unique brand secret."),
 *                 @OA\Property(property="brand_action_key",   type="string", description="Brand's action key (Static key)."),
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Success",
 *         @OA\JsonContent(
 *             type="string"
 *         ),
 *     ),
 *     @OA\Response(
 *         response=422,
 *         description="Validation error",
 *         @OA\JsonContent(
 *             type="string"
 *         ),
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Cutom error message",
 *         @OA\JsonContent(
 *             type="string"
 *         ),
 *     ),
 *     security={
 *         {"petstore_auth": {"write:pets", "read:pets"}}
 *     },
 * )
 */


/**
 * @OA\Post(
 *     path="/leaderboard/create_leaderboard",
 *     tags={"Leaderboard"},
 *     summary="Create Leaderboard.",
 *     operationId="createLeaderboard",
 *      @OA\RequestBody(
 *         @OA\MediaType(
 *             mediaType="application/x-www-form-urlencoded",
 *             @OA\Schema(
 *                 @OA\Property(property="client_id",       type="string", description="Unique brand id."),
 *                 @OA\Property(property="client_secret",   type="string", description="Unique brand secret."),
 *                 @OA\Property(property="name",   type="string"),
 *                 @OA\Property(property="description",   type="string"),
 *                 @OA\Property(property="date_from",   type="string"),
 *                 @OA\Property(property="date_to",   type="string"),
 *                 @OA\Property(property="terms",   type="string"),
 *                 @OA\Property(property="action_key",   type="string", description="optional if you want to make leaderboard for custom action."),
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Success",
 *         @OA\JsonContent(
 *             type="string"
 *         ),
 *     ),
 *     @OA\Response(
 *         response=422,
 *         description="Validation error",
 *         @OA\JsonContent(
 *             type="string"
 *         ),
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Cutom error message",
 *         @OA\JsonContent(
 *             type="string"
 *         ),
 *     ),
 *     security={
 *         {"petstore_auth": {"write:pets", "read:pets"}}
 *     },
 * )
 */
