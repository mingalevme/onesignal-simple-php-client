<?php

declare(strict_types=1);

namespace Mingalevme\OneSignal;

use Mingalevme\OneSignal\Exception\OneSignalException;

interface CreateNotificationInterface
{
    // Send to Segments
    public const SEGMENTS_ALL = 'All';
    public const SEGMENTS_SUBSCRIBED_USERS = 'Subscribed Users';
    public const SEGMENTS_ACTIVE_USERS = 'Active Users';
    public const SEGMENTS_INACTIVE_USERS = 'Inactive Users';
    public const SEGMENTS_ENGAGED_USERS = 'Engaged Users';
    public const INCLUDED_SEGMENTS = 'included_segments';
    public const EXCLUDED_SEGMENTS = 'excluded_segments';

    // Send to Users Based on Filters
    public const FILTERS = 'filters';
    public const FILTERS_FIELD = 'field';
    public const FILTERS_FIELD_TAG = 'tag';
    public const FILTERS_RELATION = 'relation';
    public const FILTERS_VALUE = 'value';
    public const FILTERS_TAG_KEY = 'key';
    public const FILTERS_LAST_SESSION = 'last_session';
    public const FILTERS_FIRST_SESSION = 'first_session';
    public const FILTERS_SESSION_COUNT = 'session_count';
    public const FILTERS_SESSION_TIME = 'session_time';
    public const FILTERS_AMOUNT_SPENT = 'amount_spent';
    public const FILTERS_BOUGHT_SKU = 'bought_sku';
    public const FILTERS_TAG = 'tag';
    public const FILTERS_LANGUAGE = 'language';
    public const FILTERS_APP_VERSION = 'app_version';
    public const FILTERS_LOCATION = 'location';
    public const FILTERS_EMAIL = 'email';
    public const FILTERS_COUNTRY = 'country';

    public const TAGS = 'tags'; // deprecated
    public const TAGS_KEY = self::FILTERS_TAG_KEY; // deprecated
    public const TAGS_RELATION = self::FILTERS_RELATION; // deprecated
    public const TAGS_VALUE = self::FILTERS_VALUE; // deprecated

    // Send to Specific Devices
    public const INCLUDE_PLAYER_IDS = 'include_player_ids';
    public const INCLUDE_EXTERNAL_USER_IDS = 'include_external_user_ids';
    public const INCLUDE_EMAIL_TOKENS = 'include_email_tokens';
    public const INCLUDE_IOS_TOKENS = 'include_ios_tokens';
    public const INCLUDE_WP_WNS_URIS = 'include_wp_wns_uris';
    public const INCLUDE_AMAZON_REG_IDS = 'include_amazon_reg_ids';
    public const INCLUDE_CHROME_REG_IDS = 'include_chrome_reg_ids';
    public const INCLUDE_CHROME_WEB_REG_IDS = 'include_chrome_web_reg_ids';
    public const INCLUDE_ANDROID_REG_IDS = 'include_android_reg_ids';

    // Idempotency
    public const EXTERNAL_ID = 'external_id';

    // Content & Language
    public const CONTENTS = 'contents';
    public const HEADINGS = 'headings';
    public const SUBTITLE = 'subtitle'; // iOS 10+
    public const TEMPLATE_ID = 'template_id';
    public const CONTENT_AVAILABLE = 'content_available'; // iOS only
    public const MUTABLE_CONTENT = 'mutable_content'; // iOS 10+

    // Email Content
    // ...

    // Attachments
    public const DATA = 'data';
    public const URL = 'url';
    public const WEB_URL = 'web_url'; // ALL BROWSERS
    public const APP_URL = 'app_url'; // ALL APPS
    public const IOS_ATTACHMENTS = 'ios_attachments'; // iOS 10+
    public const BIG_PICTURE = 'big_picture'; // Android only
    public const ADM_BIG_PICTURE = 'adm_big_picture'; // Amazon only
    public const CHROME_BIG_PICTURE = 'chrome_big_picture'; // Chrome App only

    // Action Buttons
    public const BUTTONS = 'buttons';
    public const WEB_BUTTONS = 'web_buttons'; // CHROME 48+
    public const IOS_CATEGORY = 'ios_category'; // iOS

    // Appearance
    public const ANDROID_CHANNEL_ID = 'android_channel_id'; // ANDROID
    public const EXISTING_ANDROID_CHANNEL_ID = 'existing_android_channel_id'; // ANDROID
    public const ANDROID_BACKGROUND_LAYOUT = 'android_background_layout'; // ANDROID
    public const SMALL_ICON = 'small_icon'; // ANDROID
    public const LARGE_ICON = 'large_icon'; // ANDROID
    // ...
    public const IOS_SOUND = 'ios_sound'; // iOS
    public const IOS_SOUND_NIL = 'nil'; // iOS
    public const ANDROID_SOUND = 'android_sound'; // ANDROID
    public const ANDROID_SOUND_NIL = 'notification'; // ANDROID
    public const ANDROID_LED_COLOR = 'android_led_color'; // ANDROID
    public const ANDROID_ACCENT_COLOR = 'android_accent_color'; // ANDROID
    public const ANDROID_VISIBILITY = 'android_visibility'; // ANDROID 5.0+
    public const IOS_BADGE_TYPE = 'ios_badgeType'; // iOS
    public const IOS_BADGE_COUNT = 'ios_badgeCount'; // iOS
    // This is known as APNS-collapse-id on iOS 10+ and collapse_key on Android.
    public const COLLAPSE_ID = 'collapse_id';
    public const APNS_ALERT = 'apns_alert'; // iOS 10+

    // Delivery
    public const SEND_AFTER = 'send_after';
    public const DELAYED_OPTION = 'delayed_option';
    public const DELAYED_OPTION_TIMEZONE = 'timezone';
    public const DELAYED_OPTION_LAST_ACTIVE = 'last-active';
    public const DELIVERY_TIME_OF_DAY = 'delivery_time_of_day'; // Example: "9:00AM"
    public const TTL = 'ttl'; // iOS, ANDROID, CHROME, SAFARI, CHROMEWEB
    public const PRIORITY = 'priority'; // ANDROID, CHROME, CHROMEWEB
    public const PRIORITY_LOW = 5;
    public const PRIORITY_HIGH = 10;
    public const APNS_PUSH_TYPE_OVERRIDE = 'apns_push_type_override'; // iOS

    // Grouping & Collapsing
    public const ANDROID_GROUP = 'android_group'; // ANDROID
    public const ANDROID_GROUP_MESSAGE = 'android_group_message'; // ANDROID
    public const THREAD_ID = 'thread_id'; // iOS 12+
    public const SUMMARY_ARG = 'summary_arg'; // iOS 12+
    public const SUMMARY_ARG_COUNT = 'summary_arg_count'; // iOS 12+

    // Platform to Deliver To
    public const IS_IOS = 'isIos';
    public const IS_ANDROID = 'isAndroid';
    public const IS_ANY_WEB = 'isAnyWeb';
    public const IS_EMAIL = 'isEmail';
    public const IS_CHROME_WEB = 'isChromeWeb';
    public const IS_FIREFOX = 'isFirefox';
    public const IS_SAFARI = 'isSafari';
    public const IS_WP_WNS = 'isWP_WNS';
    public const IS_ADM = 'isAdm';
    public const IS_CHROME = 'isChrome';
    public const CHANNEL_FOR_EXTERNAL_USER_IDS = 'channel_for_external_user_ids';

    // WTF???
    public const ANDROID_BACKGROUND_DATA = 'android_background_data';

    /**
     * @param non-empty-string|array<non-empty-string, non-empty-string>|null $title
     * @param array<string, mixed>|null $payload
     * @param array<string, int|string>|null $whereTags
     * @param array<string, mixed>|null $extra
     * @return CreateMessageResult
     * @throws OneSignalException
     */
    public function createNotification(
        $title = null,
        array $payload = null,
        array $whereTags = null,
        array $extra = null
    ): CreateMessageResult;
}