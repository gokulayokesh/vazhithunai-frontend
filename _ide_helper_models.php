<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Message> $messages
 * @property-read int|null $messages_count
 * @property-read \App\Models\User|null $userOne
 * @property-read \App\Models\User|null $userTwo
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Chat newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Chat newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Chat query()
 */
	class Chat extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $name
 * @property string $tamil_name
 * @property int $status
 * @property int $state_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\State|null $state
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\UserDetails> $userDetails
 * @property-read int|null $user_details_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|City newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|City newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|City query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|City whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|City whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|City whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|City whereStateId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|City whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|City whereTamilName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|City whereUpdatedAt($value)
 */
	class City extends \Eloquent {}
}

namespace App\Models{
/**
 * @property-read \App\Models\Chat|null $chat
 * @property-read \App\Models\User|null $sender
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Message newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Message newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Message query()
 */
	class Message extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $transaction_id
 * @property string $order_id
 * @property int|null $user_id
 * @property int|null $subscription_id
 * @property int $amount
 * @property string $status
 * @property array<array-key, mixed>|null $gateway_response
 * @property array<array-key, mixed>|null $gateway_order_response_json
 * @property string|null $gateway_order_response
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payment query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payment whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payment whereGatewayOrderResponse($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payment whereGatewayOrderResponseJson($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payment whereGatewayResponse($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payment whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payment whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payment whereSubscriptionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payment whereTransactionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payment whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payment whereUserId($value)
 */
	class Payment extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $user_id
 * @property int $shortlisted_user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $shortlistedUser
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Shortlist newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Shortlist newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Shortlist query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Shortlist whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Shortlist whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Shortlist whereShortlistedUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Shortlist whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Shortlist whereUserId($value)
 */
	class Shortlist extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $name
 * @property string|null $tamil_name
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\City> $cities
 * @property-read int|null $cities_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|State newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|State newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|State query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|State whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|State whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|State whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|State whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|State whereTamilName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|State whereUpdatedAt($value)
 */
	class State extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $name
 * @property int $validity_days
 * @property string $price
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Subscription newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Subscription newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Subscription query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Subscription whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Subscription whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Subscription whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Subscription wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Subscription whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Subscription whereValidityDays($value)
 */
	class Subscription extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $user_id
 * @property string $plan_name
 * @property string|null $plan_code
 * @property string|null $amount
 * @property \Illuminate\Support\Carbon $start_date
 * @property \Illuminate\Support\Carbon $end_date
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SubscriptionHistory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SubscriptionHistory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SubscriptionHistory query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SubscriptionHistory whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SubscriptionHistory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SubscriptionHistory whereEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SubscriptionHistory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SubscriptionHistory wherePlanCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SubscriptionHistory wherePlanName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SubscriptionHistory whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SubscriptionHistory whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SubscriptionHistory whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SubscriptionHistory whereUserId($value)
 */
	class SubscriptionHistory extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string|null $identifier Unique public identifier for user
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read mixed $mobile
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, User> $shortlistedUsers
 * @property-read int|null $shortlisted_users_count
 * @property-read \App\Models\UserDetails|null $userDetails
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\UserImages> $userImages
 * @property-read int|null $user_images_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereIdentifier($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $user_id
 * @property string $birth_place
 * @property string $dob
 * @property int|null $city_id
 * @property string|null $birth_time
 * @property string $highest_education
 * @property string $education_field
 * @property string|null $specialization
 * @property string|null $institution
 * @property string|null $completion_year
 * @property string|null $additional_qualifications
 * @property string $occupation_category
 * @property string $job_title
 * @property string|null $company_name
 * @property string|null $employment_type
 * @property string|null $industry
 * @property string $work_location
 * @property string|null $annual_income
 * @property int|null $experience_years
 * @property string $gender
 * @property string $height
 * @property string|null $color
 * @property string $caste
 * @property string $marital_status
 * @property string $address
 * @property string|null $body_type
 * @property string|null $physical_status
 * @property string $mother_tongue
 * @property string|null $interests
 * @property string|null $hobbies
 * @property string|null $favorite_cuisine
 * @property string|null $favorite_music
 * @property string|null $sports
 * @property string|null $pet_preference
 * @property string|null $travel_preference
 * @property string|null $diet_preference
 * @property string|null $smoking_habits
 * @property string|null $drinking_habits
 * @property string|null $languages_known
 * @property string|null $life_motto
 * @property string|null $email
 * @property string|null $mobile
 * @property string|null $facebook_profile_url
 * @property string|null $instagram_profile_url
 * @property string|null $twitter_profile_url
 * @property string $family_status
 * @property string|null $family_god
 * @property string $father_alive
 * @property string $mother_alive
 * @property string $parent_mobile
 * @property string|null $father_work
 * @property string|null $mother_work
 * @property int|null $brothers_count
 * @property int|null $sisters_count
 * @property int|null $married_brothers
 * @property int|null $married_sisters
 * @property string $own_house
 * @property string|null $family_notes
 * @property string $birth_star
 * @property string $rahu_ketu
 * @property string $chevvai
 * @property string $zodiac_sign
 * @property string $birth_lagnam
 * @property string|null $expectations
 * @property string|null $previous_marriage
 * @property string|null $additional_horoscope
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\City|null $city
 * @property-read \App\Models\User $user
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\UserImages> $userHoroscopeImages
 * @property-read int|null $user_horoscope_images_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\UserImages> $userImages
 * @property-read int|null $user_images_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserDetails newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserDetails newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserDetails query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserDetails whereAdditionalHoroscope($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserDetails whereAdditionalQualifications($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserDetails whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserDetails whereAnnualIncome($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserDetails whereBirthLagnam($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserDetails whereBirthPlace($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserDetails whereBirthStar($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserDetails whereBirthTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserDetails whereBodyType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserDetails whereBrothersCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserDetails whereCaste($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserDetails whereChevvai($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserDetails whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserDetails whereColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserDetails whereCompanyName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserDetails whereCompletionYear($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserDetails whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserDetails whereDietPreference($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserDetails whereDob($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserDetails whereDrinkingHabits($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserDetails whereEducationField($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserDetails whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserDetails whereEmploymentType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserDetails whereExpectations($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserDetails whereExperienceYears($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserDetails whereFacebookProfileUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserDetails whereFamilyGod($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserDetails whereFamilyNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserDetails whereFamilyStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserDetails whereFatherAlive($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserDetails whereFatherWork($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserDetails whereFavoriteCuisine($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserDetails whereFavoriteMusic($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserDetails whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserDetails whereHeight($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserDetails whereHighestEducation($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserDetails whereHobbies($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserDetails whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserDetails whereIndustry($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserDetails whereInstagramProfileUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserDetails whereInstitution($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserDetails whereInterests($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserDetails whereJobTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserDetails whereLanguagesKnown($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserDetails whereLifeMotto($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserDetails whereMaritalStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserDetails whereMarriedBrothers($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserDetails whereMarriedSisters($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserDetails whereMobile($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserDetails whereMotherAlive($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserDetails whereMotherTongue($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserDetails whereMotherWork($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserDetails whereOccupationCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserDetails whereOwnHouse($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserDetails whereParentMobile($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserDetails wherePetPreference($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserDetails wherePhysicalStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserDetails wherePreviousMarriage($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserDetails whereRahuKetu($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserDetails whereSistersCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserDetails whereSmokingHabits($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserDetails whereSpecialization($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserDetails whereSports($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserDetails whereTravelPreference($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserDetails whereTwitterProfileUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserDetails whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserDetails whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserDetails whereWorkLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserDetails whereZodiacSign($value)
 */
	class UserDetails extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $user_id
 * @property string $image_path
 * @property string $type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserHoroscopeImages newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserHoroscopeImages newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserHoroscopeImages query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserHoroscopeImages whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserHoroscopeImages whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserHoroscopeImages whereImagePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserHoroscopeImages whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserHoroscopeImages whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserHoroscopeImages whereUserId($value)
 */
	class UserHoroscopeImages extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $user_id
 * @property string $image_path
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserImages newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserImages newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserImages query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserImages whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserImages whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserImages whereImagePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserImages whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserImages whereUserId($value)
 */
	class UserImages extends \Eloquent {}
}

