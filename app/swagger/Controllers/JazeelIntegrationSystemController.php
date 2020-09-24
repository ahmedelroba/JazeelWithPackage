<?php



/**
 * @OA\Post(
 *     path="/users/create",
 *     tags={"Users"},
 *     summary="You can create a new user for any brand by client_id and client_secret.",
 *     operationId="createUser",
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
 *     path="/users/add_point",
 *     tags={"Users"},
 *     summary="Brands can add lot of actions for users for give them points and make users history.",
 *     operationId="add_point",
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
 *     path="/users/get_balance",
 *     tags={"Users"},
 *     summary="Get Balance.",
 *     operationId="get_balance",
 *      @OA\RequestBody(
 *         @OA\MediaType(
 *             mediaType="application/x-www-form-urlencoded",
 *             @OA\Schema(
 *                 @OA\Property(property="client_id",               type="string", description="Unique brand id."),
 *                 @OA\Property(property="client_secret",           type="string", description="Unique brand secret."),
 *                 @OA\Property(property="user_referral_key",       type="string", description="Brand's user referral key, it saved in jazeel when user created."),
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
 *     path="/users/actions_records",
 *     tags={"Users"},
 *     summary="Show all brand's users points history.",
 *     operationId="actions_records",
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
 *     path="/users/get_leaderboards",
 *     tags={"Users"},
 *     summary="Show all brand's users points history.",
 *     operationId="get_leaderboards",
 *      @OA\RequestBody(
 *         @OA\MediaType(
 *             mediaType="application/x-www-form-urlencoded",
 *             @OA\Schema(
 *                 @OA\Property(property="client_id",       type="string", description="Unique brand id."),
 *                 @OA\Property(property="client_secret",   type="string", description="Unique brand secret."),
 *                 @OA\Property(property="user_referral_key",         type="string", description="Brand's user referral key, it saved in jazeel when user created."),
 *                 @OA\Property(property="status",         type="string", description="Leaderboard status ['all' -  'active' - 'inactive']."),
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
 *     path="/users/find_leaderboard",
 *     tags={"Users"},
 *     summary="Show one leaderbord but we will make sure is this user is exist on it.",
 *     operationId="find_leaderboard",
 *      @OA\RequestBody(
 *         @OA\MediaType(
 *             mediaType="application/x-www-form-urlencoded",
 *             @OA\Schema(
 *                 @OA\Property(property="client_id",       type="string", description="Unique brand id."),
 *                 @OA\Property(property="client_secret",   type="string", description="Unique brand secret."),
 *                 @OA\Property(property="user_referral_key",         type="string", description="Brand's user referral key, it saved in jazeel when user created."),
 *                 @OA\Property(property="leaderboard_key",         type="string", description="Leaderboard key."),
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



/*
    Leaderboard Section
 */



/**
 * @OA\Post(
 *     path="/leaderboard/list",
 *     tags={"Leaderboard"},
 *     summary="Get all My leaderboards.",
 *     operationId="listLeaderboard",
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
 *     path="/leaderboard/fake_records",
 *     tags={"Leaderboard"},
 *     summary="Add Fack Records leaderboards.",
 *     operationId="fakeRecordsLeaderboard",
 *      @OA\RequestBody(
 *         @OA\MediaType(
 *             mediaType="application/x-www-form-urlencoded",
 *             @OA\Schema(
 *                 @OA\Property(property="client_id",       type="string", description="Unique brand id."),
 *                 @OA\Property(property="client_secret",   type="string", description="Unique brand secret."),
 *                 @OA\Property(property="leaderboard_key",  type="string"),
 *                 @OA\Property(
 *                     property="users_email",
 *                     type="array",
 *                     @OA\Items(
 *                             type="string",
 *                             default="available"
 *                         ),
 *                  ),
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
 *     path="/leaderboard/create",
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
 *   @OA\Property(
*       property="reward_key",
*       type="array",
*       @OA\Items(
*               type="string",
*               default="available"
*           ),
*    ),

*  @OA\Property(
*       property="rank",
*       type="array",
*       @OA\Items(
*               type="string",
*               default="available"
*           ),
*    ),
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



/**
 * @OA\Post(
 *     path="/leaderboard/update",
 *     tags={"Leaderboard"},
 *     summary="Upldate Leaderboard.",
 *     operationId="updateLeaderboard",
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
 *   @OA\Property(
*       property="reward_key[]",
*       type="array",
*       @OA\Items(
*               type="string",
*               default="available"
*           ),
*    ),

*  @OA\Property(
*       property="rank[]",
*       type="array",
*       @OA\Items(
*               type="string",
*               default="available"
*           ),
*    ),
 *                 @OA\Property(property="action_key",   type="string", description="optional if you want to make leaderboard for custom action."),
 *                 @OA\Property(property="leaderboard_key",  type="string"),
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
 *     path="/leaderboard/delete",
 *     tags={"Leaderboard"},
 *     summary="Upldate Leaderboard.",
 *     operationId="updateLeaderboard",
 *      @OA\RequestBody(
 *         @OA\MediaType(
 *             mediaType="application/x-www-form-urlencoded",
 *             @OA\Schema(
 *                 @OA\Property(property="client_id",       type="string", description="Unique brand id."),
 *                 @OA\Property(property="client_secret",   type="string", description="Unique brand secret."),
 *                 @OA\Property(property="leaderboard_key",  type="string"),
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
 *     path="/leaderboard/get_users_of_leaderboard",
 *     tags={"Leaderboard"},
 *     summary="Get all Users in leaderboards.",
 *     operationId="listUsersLeaderboard",
 *      @OA\RequestBody(
 *         @OA\MediaType(
 *             mediaType="application/x-www-form-urlencoded",
 *             @OA\Schema(
 *                 @OA\Property(property="client_id",       type="string", description="Unique brand id."),
 *                 @OA\Property(property="client_secret",   type="string", description="Unique brand secret."),
 *                 @OA\Property(property="leaderboard_key",  type="string"),
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
 *     path="/leaderboard/find",
 *     tags={"Leaderboard"},
 *     summary="Get details of leaderboard.",
 *     operationId="listUsersLeaderboard",
 *      @OA\RequestBody(
 *         @OA\MediaType(
 *             mediaType="application/x-www-form-urlencoded",
 *             @OA\Schema(
 *                 @OA\Property(property="client_id",       type="string", description="Unique brand id."),
 *                 @OA\Property(property="client_secret",   type="string", description="Unique brand secret."),
 *                 @OA\Property(property="leaderboard_key",  type="string"),
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
 *     path="/leaderboard/search",
 *     tags={"Leaderboard"},
 *     summary="search on leaderboards.",
 *     operationId="searchLeaderboard",
 *      @OA\RequestBody(
 *         @OA\MediaType(
 *             mediaType="application/x-www-form-urlencoded",
 *             @OA\Schema(
 *                 @OA\Property(property="client_id",       type="string", description="Unique brand id."),
 *                 @OA\Property(property="client_secret",   type="string", description="Unique brand secret."),
 *                 @OA\Property(property="name",            type="string"),
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





/*
    Actions section
 */




/**
 * @OA\Post(
 *     path="/actions/list",
 *     tags={"Actions"},
 *     summary="Get all my actions.",
 *     operationId="listLeaderboard",
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
 *     path="/actions/create",
 *     tags={"Actions"},
 *     summary="Create Action.",
 *     operationId="createAction",
 *      @OA\RequestBody(
 *         @OA\MediaType(
 *             mediaType="application/x-www-form-urlencoded",
 *             @OA\Schema(
 *                 @OA\Property(property="client_id",       type="string", description="Unique brand id."),
 *                 @OA\Property(property="client_secret",   type="string", description="Unique brand secret."),
 *                 @OA\Property(property="name",            type="string"),
 *                 @OA\Property(property="description",     type="string"),
 *                 @OA\Property(property="points",          type="string"),
 *                 @OA\Property(property="status",          type="boolean"),
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
 *     path="/actions/update",
 *     tags={"Actions"},
 *     summary="Upldate Action.",
 *     operationId="updateAction",
 *      @OA\RequestBody(
 *         @OA\MediaType(
 *             mediaType="application/x-www-form-urlencoded",
 *             @OA\Schema(
 *                 @OA\Property(property="client_id",       type="string", description="Unique brand id."),
 *                 @OA\Property(property="client_secret",   type="string", description="Unique brand secret."),
 *                 @OA\Property(property="name",            type="string"),
 *                 @OA\Property(property="description",     type="string"),
 *                 @OA\Property(property="points",          type="string"),
 *                 @OA\Property(property="action_key",      type="string"),
 *                 @OA\Property(property="status",          type="boolean"),
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
 *     path="/actions/delete",
 *     tags={"Actions"},
 *     summary="Upldate Action.",
 *     operationId="updateAction",
 *      @OA\RequestBody(
 *         @OA\MediaType(
 *             mediaType="application/x-www-form-urlencoded",
 *             @OA\Schema(
 *                 @OA\Property(property="client_id",       type="string", description="Unique brand id."),
 *                 @OA\Property(property="client_secret",   type="string", description="Unique brand secret."),
 *                 @OA\Property(property="action_key",  type="string"),
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
 *     path="/actions/find",
 *     tags={"Actions"},
 *     summary="Get details of action.",
 *     operationId="findAction",
 *      @OA\RequestBody(
 *         @OA\MediaType(
 *             mediaType="application/x-www-form-urlencoded",
 *             @OA\Schema(
 *                 @OA\Property(property="client_id",       type="string", description="Unique brand id."),
 *                 @OA\Property(property="client_secret",   type="string", description="Unique brand secret."),
 *                 @OA\Property(property="action_key",  type="string"),
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
 *     path="/actions/search",
 *     tags={"Actions"},
 *     summary="Search action with name.",
 *     operationId="searchAction",
 *      @OA\RequestBody(
 *         @OA\MediaType(
 *             mediaType="application/x-www-form-urlencoded",
 *             @OA\Schema(
 *                 @OA\Property(property="client_id",       type="string", description="Unique brand id."),
 *                 @OA\Property(property="client_secret",   type="string", description="Unique brand secret."),
 *                 @OA\Property(property="name",            type="string"),
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






/*
    Sponsor section
 */




/**
 * @OA\Post(
 *     path="/sponsors/list",
 *     tags={"Sponsors"},
 *     summary="Get all my sponsors.",
 *     operationId="listSponsors",
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
 *     path="/sponsors/create",
 *     tags={"Sponsors"},
 *     summary="Create sponsors.",
 *     operationId="createSponsors",
 *      @OA\RequestBody(
 *         @OA\MediaType(
 *             mediaType="multipart/form-data",
 *             @OA\Schema(
 *                 @OA\Property(property="client_id",       type="string", description="Unique brand id."),
 *                 @OA\Property(property="client_secret",   type="string", description="Unique brand secret."),
 *                 @OA\Property(property="name",            type="string"),
 *                 @OA\Property(property="description",     type="string"),
 *                 @OA\Property(property="status",          type="boolean"),
 *                 @OA\Property(property="logo",          type="file"),
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
 *     path="/sponsors/update",
 *     tags={"Sponsors"},
 *     summary="Upldate sponsors.",
 *     operationId="updateSponsors",
 *      @OA\RequestBody(
 *         @OA\MediaType(
 *             mediaType="multipart/form-data",
 *             @OA\Schema(
 *                 @OA\Property(property="client_id",       type="string", description="Unique brand id."),
 *                 @OA\Property(property="client_secret",   type="string", description="Unique brand secret."),
 *                 @OA\Property(property="name",            type="string"),
 *                 @OA\Property(property="description",     type="string"),
 *                 @OA\Property(property="status",          type="boolean"),
 *                 @OA\Property(property="logo",            type="file"),
 *                 @OA\Property(property="sponsor_key",     type="string"),
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
 *     path="/sponsors/delete",
 *     tags={"Sponsors"},
 *     summary="Upldate sponsors.",
 *     operationId="deleteSponsors",
 *      @OA\RequestBody(
 *         @OA\MediaType(
 *             mediaType="application/x-www-form-urlencoded",
 *             @OA\Schema(
 *                 @OA\Property(property="client_id",       type="string", description="Unique brand id."),
 *                 @OA\Property(property="client_secret",   type="string", description="Unique brand secret."),
 *                 @OA\Property(property="sponsor_key",     type="string"),
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
 *     path="/sponsors/find",
 *     tags={"Sponsors"},
 *     summary="Get details of sponsors.",
 *     operationId="findSponsors",
 *      @OA\RequestBody(
 *         @OA\MediaType(
 *             mediaType="application/x-www-form-urlencoded",
 *             @OA\Schema(
 *                 @OA\Property(property="client_id",       type="string", description="Unique brand id."),
 *                 @OA\Property(property="client_secret",   type="string", description="Unique brand secret."),
 *                 @OA\Property(property="sponsor_key",     type="string"),
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
 *     path="/sponsors/search",
 *     tags={"Sponsors"},
 *     summary="Search sponsors with name.",
 *     operationId="searchsponsors",
 *      @OA\RequestBody(
 *         @OA\MediaType(
 *             mediaType="application/x-www-form-urlencoded",
 *             @OA\Schema(
 *                 @OA\Property(property="client_id",       type="string", description="Unique brand id."),
 *                 @OA\Property(property="client_secret",   type="string", description="Unique brand secret."),
 *                 @OA\Property(property="name",            type="string"),
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





/*
    Reward section
 */




/**
 * @OA\Post(
 *     path="/rewards/list",
 *     tags={"Rewards"},
 *     summary="Get all my rewards.",
 *     operationId="listrewards",
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
 *     path="/rewards/create",
 *     tags={"Rewards"},
 *     summary="Create rewards.",
 *     operationId="createRewards",
 *      @OA\RequestBody(
 *         @OA\MediaType(
 *             mediaType="multipart/form-data",
 *             @OA\Schema(
 *                 @OA\Property(property="client_id",       type="string", description="Unique brand id."),
 *                 @OA\Property(property="client_secret",   type="string", description="Unique brand secret."),
 *                 @OA\Property(property="name",            type="string"),
 *                 @OA\Property(property="description",     type="string"),
 *                 @OA\Property(property="sponsor_key",     type="string"),
 *                 @OA\Property(property="quantity",          type="string"),
 *                 @OA\Property(property="image",           type="file"),
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
 *     path="/rewards/update",
 *     tags={"Rewards"},
 *     summary="Upldate rewards.",
 *     operationId="updateRewards",
 *      @OA\RequestBody(
 *         @OA\MediaType(
 *             mediaType="multipart/form-data",
 *             @OA\Schema(
 *                 @OA\Property(property="client_id",       type="string", description="Unique brand id."),
 *                 @OA\Property(property="client_secret",   type="string", description="Unique brand secret."),
 *                 @OA\Property(property="name",            type="string"),
 *                 @OA\Property(property="description",     type="string"),
 *                 @OA\Property(property="sponsor_key",     type="string"),
 *                 @OA\Property(property="quantity",        type="string"),
 *                 @OA\Property(property="image",           type="file"),
 *                 @OA\Property(property="reward_key",      type="string"),
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
 *     path="/rewards/delete",
 *     tags={"Rewards"},
 *     summary="Delete rewards.",
 *     operationId="deleteRewards",
 *      @OA\RequestBody(
 *         @OA\MediaType(
 *             mediaType="application/x-www-form-urlencoded",
 *             @OA\Schema(
 *                 @OA\Property(property="client_id",       type="string", description="Unique brand id."),
 *                 @OA\Property(property="client_secret",   type="string", description="Unique brand secret."),
 *                 @OA\Property(property="reward_key",     type="string"),
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
 *     path="/rewards/find",
 *     tags={"Rewards"},
 *     summary="Get details of reward.",
 *     operationId="findRewards",
 *      @OA\RequestBody(
 *         @OA\MediaType(
 *             mediaType="application/x-www-form-urlencoded",
 *             @OA\Schema(
 *                 @OA\Property(property="client_id",       type="string", description="Unique brand id."),
 *                 @OA\Property(property="client_secret",   type="string", description="Unique brand secret."),
 *                 @OA\Property(property="reward_key",      type="string"),
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
 *     path="/rewards/search",
 *     tags={"Rewards"},
 *     summary="Search rewards with name.",
 *     operationId="searchRewards",
 *      @OA\RequestBody(
 *         @OA\MediaType(
 *             mediaType="application/x-www-form-urlencoded",
 *             @OA\Schema(
 *                 @OA\Property(property="client_id",       type="string", description="Unique brand id."),
 *                 @OA\Property(property="client_secret",   type="string", description="Unique brand secret."),
 *                 @OA\Property(property="name",            type="string"),
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









/*
    Reward History section
 */




/**
 * @OA\Post(
 *     path="/rewards_history/list",
 *     tags={"RewardsHistory"},
 *     summary="Get all my rewards_history.",
 *     operationId="listrewards_history",
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
 *     path="/rewards_history/create",
 *     tags={"RewardsHistory"},
 *     summary="Create rewards_history.",
 *     operationId="createrewards_history",
 *      @OA\RequestBody(
 *         @OA\MediaType(
 *             mediaType="application/x-www-form-urlencoded",
 *             @OA\Schema(
 *                 @OA\Property(property="client_id",       type="string", description="Unique brand id."),
 *                 @OA\Property(property="client_secret",   type="string", description="Unique brand secret."),
 *                 @OA\Property(property="user_key",     type="string"),
 *                 @OA\Property(property="quantity",          type="string"),
 *                 @OA\Property(property="reward_key", type="string"),
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
 *     path="/rewards_history/update",
 *     tags={"RewardsHistory"},
 *     summary="Upldate rewards_history.",
 *     operationId="updaterewards_history",
 *      @OA\RequestBody(
 *         @OA\MediaType(
 *             mediaType="application/x-www-form-urlencoded",
 *             @OA\Schema(
 *                 @OA\Property(property="client_id",       type="string", description="Unique brand id."),
 *                 @OA\Property(property="client_secret",   type="string", description="Unique brand secret."),
 *                 @OA\Property(property="user_key",     type="string"),
 *                 @OA\Property(property="quantity",          type="string"),
 *                 @OA\Property(property="reward_key", type="string"),
 *                 @OA\Property(property="reward_history_key", type="string"),
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
 *     path="/rewards_history/delete",
 *     tags={"RewardsHistory"},
 *     summary="Delete rrewards_history.",
 *     operationId="deleterewards_history",
 *      @OA\RequestBody(
 *         @OA\MediaType(
 *             mediaType="application/x-www-form-urlencoded",
 *             @OA\Schema(
 *                 @OA\Property(property="client_id",       type="string", description="Unique brand id."),
 *                 @OA\Property(property="client_secret",   type="string", description="Unique brand secret."),
 *                 @OA\Property(property="reward_history_key",     type="string"),
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
 *     path="/rewards_history/find",
 *     tags={"RewardsHistory"},
 *     summary="Get details of rewards_history.",
 *     operationId="findrewards_history",
 *      @OA\RequestBody(
 *         @OA\MediaType(
 *             mediaType="application/x-www-form-urlencoded",
 *             @OA\Schema(
 *                 @OA\Property(property="client_id",       type="string", description="Unique brand id."),
 *                 @OA\Property(property="client_secret",   type="string", description="Unique brand secret."),
 *                 @OA\Property(property="reward_history_key",      type="string"),
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
 *     path="/rewards_history/search",
 *     tags={"RewardsHistory"},
 *     summary="Search rewards_history with name.",
 *     operationId="searchrewards_history",
 *      @OA\RequestBody(
 *         @OA\MediaType(
 *             mediaType="application/x-www-form-urlencoded",
 *             @OA\Schema(
 *                 @OA\Property(property="client_id",       type="string", description="Unique brand id."),
 *                 @OA\Property(property="client_secret",   type="string", description="Unique brand secret."),
 *                 @OA\Property(property="name",            type="string"),
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
