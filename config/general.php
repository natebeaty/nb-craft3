<?php
/**
 * General Configuration
 *
 * All of your system's general configuration settings go in here. You can see a
 * list of the available settings in vendor/craftcms/cms/src/config/GeneralConfig.php.
 *
 * @see craft\config\GeneralConfig
 */

return [
    // Global settings
    '*' => [
        // Default Week Start Day (0 = Sunday, 1 = Monday...)
        'defaultWeekStartDay' => 0,

        // Enable CSRF Protection (recommended)
        'enableCsrfProtection' => true,

        // Whether generated URLs should omit "index.php"
        'omitScriptNameInUrls' => true,

        // Control Panel trigger word
        'cpTrigger' => 'admin',

        // The secure key Craft will use for hashing and encrypting data
        'securityKey' => getenv('SECURITY_KEY'),

        // Base site URL
        'siteUrl' => getenv('SITE_URL'),

        'aliases' => [
            '@assetsBaseUrl' => getenv('ASSETS_BASE_URL'),
            '@assetsBasePath' => getenv('ASSETS_BASE_PATH'),
        ],

    ],

    // Dev environment settings
    'dev' => [
        // Dev Mode (see https://craftcms.com/support/dev-mode)
        'devMode' => true,
    ],

    // Staging environment settings
    'staging' => [
        // Disable project config changes on production
        'allowAdminChanges' => false,
    ],

    // Production environment settings
    'production' => [
        // Disable project config changes on production
        'allowAdminChanges' => false,
    ],
];
