<?php

use Illuminate\Support\Facades\Facade;
use Illuminate\Support\ServiceProvider;

return [

    /*
    |--------------------------------------------------------------------------
    | Application Name
    |--------------------------------------------------------------------------
    |
    | This value is the name of your application. This value is used when the
    | framework needs to place the application's name in a notification or
    | any other location as required by the application or its packages.
    |
    */

    'name' => env('APP_NAME', 'Laravel'),

    /*
    |--------------------------------------------------------------------------
    | Application Environment
    |--------------------------------------------------------------------------
    |
    | This value determines the "environment" your application is currently
    | running in. This may determine how you prefer to configure various
    | services the application utilizes. Set this in your ".env" file.
    |
    */

    'env' => env('APP_ENV', 'production'),

    /*
    |--------------------------------------------------------------------------
    | Application Debug Mode
    |--------------------------------------------------------------------------
    |
    | When your application is in debug mode, detailed error messages with
    | stack traces will be shown on every error that occurs within your
    | application. If disabled, a simple generic error page is shown.
    |
    */

    'debug' => (bool) env('APP_DEBUG', false),

    /*
    |--------------------------------------------------------------------------
    | Application URL
    |--------------------------------------------------------------------------
    |
    | This URL is used by the console to properly generate URLs when using
    | the Artisan command line tool. You should set this to the root of
    | your application so that it is used when running Artisan tasks.
    |
    */

    'url' => env('APP_URL', 'http://localhost'),

    'asset_url' => env('ASSET_URL'),

    /*
    |--------------------------------------------------------------------------
    | Application Timezone
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default timezone for your application, which
    | will be used by the PHP date and date-time functions. We have gone
    | ahead and set this to a sensible default for you out of the box.
    |
    */

    'timezone' => 'UTC',

    /*
    |--------------------------------------------------------------------------
    | Application Locale Configuration
    |--------------------------------------------------------------------------
    |
    | The application locale determines the default locale that will be used
    | by the translation service provider. You are free to set this value
    | to any of the locales which will be supported by the application.
    |
    */

    'locale' => 'en',

    /*
    |--------------------------------------------------------------------------
    | Application Fallback Locale
    |--------------------------------------------------------------------------
    |
    | The fallback locale determines the locale to use when the current one
    | is not available. You may change the value to correspond to any of
    | the language folders that are provided through your application.
    |
    */

    'fallback_locale' => 'en',

    /*
    |--------------------------------------------------------------------------
    | Faker Locale
    |--------------------------------------------------------------------------
    |
    | This locale will be used by the Faker PHP library when generating fake
    | data for your database seeds. For example, this will be used to get
    | localized telephone numbers, street address information and more.
    |
    */

    'faker_locale' => 'en_US',

    /*
    |--------------------------------------------------------------------------
    | Encryption Key
    |--------------------------------------------------------------------------
    |
    | This key is used by the Illuminate encrypter service and should be set
    | to a random, 32 character string, otherwise these encrypted strings
    | will not be safe. Please do this before deploying an application!
    |
    */

    'key' => env('APP_KEY'),

    'cipher' => 'AES-256-CBC',

    /*
    |--------------------------------------------------------------------------
    | Maintenance Mode Driver
    |--------------------------------------------------------------------------
    |
    | These configuration options determine the driver used to determine and
    | manage Laravel's "maintenance mode" status. The "cache" driver will
    | allow maintenance mode to be controlled across multiple machines.
    |
    | Supported drivers: "file", "cache"
    |
    */

    'maintenance' => [
        'driver' => 'file',
        // 'store' => 'redis',
    ],

    /*
    |--------------------------------------------------------------------------
    | Autoloaded Service Providers
    |--------------------------------------------------------------------------
    |
    | The service providers listed here will be automatically loaded on the
    | request to your application. Feel free to add your own services to
    | this array to grant expanded functionality to your applications.
    |
    */

    'providers' => ServiceProvider::defaultProviders()->merge([
        /*
         * Package Service Providers...
         */

        /*
         * Application Service Providers...
         */
        App\Providers\AppServiceProvider::class,
        App\Providers\AuthServiceProvider::class,
        // App\Providers\BroadcastServiceProvider::class,
        App\Providers\EventServiceProvider::class,
        App\Providers\RouteServiceProvider::class,
    ])->toArray(),

    /*
    |--------------------------------------------------------------------------
    | Class Aliases
    |--------------------------------------------------------------------------
    |
    | This array of class aliases will be registered when this application
    | is started. However, feel free to register as many as you wish as
    | the aliases are "lazy" loaded so they don't hinder performance.
    |
    */

    'aliases' => Facade::defaultAliases()->merge([
        // 'Example' => App\Facades\Example::class,
    ])->toArray(),


    'questions' => [
        "1" =>
        [
            [
                "Bt corn is a type of genetically modified organism (GMO). What does" . '"Bt"' . "stand for in this context?",
                "Bacillus thuringiensis", "Bioengineered Technology", "Beneficial Trait", "Bacillus terrestris", '"Bt "' . "in Bt corn stands for Bacillus thuringiensis, a bacterium whose gene is inserted into the corn to produce a protein that is toxic to certain insect pests. This helps in protecting the crops from damage and reduces the need for chemical pesticides.", 0
            ],
            [
                "Which of the following cites the disadvantage of Genetically Modified Organism (GMO)?",
                "It makes agricultural practices much safer.", "It can create an extended life.", "It can lead to more birth defects.", "It reduces the risks of depleted water supply.", "One of the concerns cited by opponents of GMOs is the potential for unintended health consequences, including birth defects, although the scientific evidence on this is mixed and often debated. This option highlights a perceived disadvantage. In contrast, options A, B, and D point out benefits or neutral effects.", 2
            ],
            [
                "What is the primary goal of genetic engineering?",
                "To create new species",
                "To modify the genetic makeup of an organism",
                "To increase biodiversity",
                "To eliminate the need for reproduction",
                "Genetic engineering involves altering an organism's DNA to achieve desired traits or outcomes, such as resistance to diseases or improved nutritional content.", 1
            ],
            [
                "Which enzyme is commonly used to cut DNA at specific sequences in genetic engineering?",
                "DNA polymerase",
                "Helicase",
                "Restriction enzyme",
                "Ligase", "Restriction enzymes recognize and cut DNA at specific sequences, which is essential for manipulating genes in genetic engineering.",
                3
            ],
            [
                "What is the role of plasmids in genetic engineering?",
                "They serve as templates for DNA replication",
                "They carry foreign DNA into host cells",
                "They degrade unwanted DNA sequences",
                "They synthesize proteins",
                "Plasmids are small, circular DNA molecules used as vectors to transfer foreign DNA into host cells, facilitating genetic modification.",
                1
            ],
            [
                "Which process involves the uptake of foreign DNA by a cell?",
                "Transcription",
                "Translation",
                "Transformation",
                "Translocation",
                "Transformation is the process by which a cell takes up foreign DNA from its surroundings, a key step in genetic engineering.",
                2
            ],
            [
                "What is the function of DNA ligase in genetic engineering?",
                "To cut DNA at specific sites", "To unwind the DNA helix",
                "To join DNA fragments together",
                "To replicate DNA strands",
                "DNA ligase is an enzyme that seals break in the DNA backbone, joining DNA fragments during the genetic engineering process.",
                2
            ],
            [
                "Which technique is used to amplify specific DNA sequences?",
                "Gel electrophoresis",
                "Polymerase chain reaction (PCR)",
                "Southern blotting",
                "DNA sequencing",
                "PCR is a method used to make millions of copies of a specific DNA sequence, enabling detailed study and manipulation.",
                1,
            ],
            [
                "What is a common application of genetic engineering in agriculture?",
                "Increasing plant biodiversity",
                "Creating pest-resistant crops",
                "Reducing the need for photosynthesis",
                "Enhancing soil fertility",
                "Genetic engineering is often used to develop crops that are resistant to pests, reducing the need for chemical pesticides.",
                1
            ],
            [
                "CRISPR-Cas9 is a revolutionary tool in genetic engineering. What does it do?",
                "It creates new RNA molecules",
                "It cuts and edits specific DNA sequences",
                "It transports DNA across cell membranes",
                "It synthesizes proteins",
                "CRISPR-Cas9 is a precise genome-editing tool that can target and modify specific DNA sequences, revolutionizing genetic engineering.",
                1
            ],
            [
                "In genetic engineering, what is the term for an organism that contains DNA from another species?",
                "Clone",
                "Hybrid",
                "Transgenic organism",
                "Mutant",
                "A transgenic organism has been genetically modified to contain DNA from a different species, often to express new traits.",
                2
            ],
            [
                "What is the first step in the genetic engineering process?",
                "Inserting the modified DNA into a host organism",
                "Isolating the gene of interest",
                "Amplifying the gene using PCR",
                "Selecting the appropriate vector",
                "The first step in genetic engineering is to identify and isolate the specific gene that you want to modify or transfer, which is essential for subsequent steps.",
                1
            ],
        ],
        "3" => [
            [
                "Which of the following is a common benefit associated with GMOs:",
                "Reduced agricultural productivity",
                "Increased pesticide use",
                "Enhanced nutritional content",
                "Decreased farmer profits",
                "GMOs can be engineered to have higher nutritional content, such as Golden Rice, which is fortified with vitamin A.",
                2
            ],
            [
                "One of the primary risks of GMOs is the potential for:",
                "Increased biodiversity",
                "Reduced crop yields",
                "Development of superweeds",
                "Enhanced soil fertility",
                "Superweeds can develop resistance to herbicides used on GMOs, making them harder to control.",
                2
            ],
            [
                "How can GMOs benefit the environment:",
                "By requiring more water for growth",
                "By reducing the need for chemical pesticides",
                "By increasing greenhouse gas emissions",
                "By increasing soil erosion",
                "GMOs can be engineered to be pest-resistant, thereby reducing the need for chemical pesticides and benefiting the environment.",
                1
            ],
            [
                "What is a common concern about the impact of GMOs on human health:",
                "Increased risk of diabetes",
                "Allergic reactions",
                "Improved immune response",
                "Enhanced digestive health",
                "There is concern that GMOs may introduce new allergens into the food supply or exacerbate existing allergies.",
                1
            ],
            [
                "Which of the following is NOT a benefit of using GMOs:",
                "Higher crop yields",
                "Resistance to pests and diseases",
                "Guaranteed long-term sustainability",
                "Reduced agricultural chemical use",
                "While GMOs can offer many benefits, guaranteed long-term sustainability is not assured, as there are concerns about ecological impacts and resistance.",
                2
            ],
            [
                "GMOs can help address food security by:",
                "Increasing food waste",
                "Decreasing crop diversity",
                "Improving crop resilience to climate change",
                "Reducing food nutritional value",
                "GMOs can be designed to withstand extreme weather conditions, making crops more resilient to climate change.",
                2
            ],
            [
                "A potential environmental risk of GMOs is:",
                "Increased crop diversity",
                "Decreased soil erosion",
                "Gene transfer to non-target species",
                "Improved water retention in soil",
                "There is a risk that genes from GMOs can transfer to wild relatives or non-target species, potentially disrupting ecosystems.",
                2
            ],
            [
                "Which regulatory approach is often taken to manage the risks associated with GMOs:",
                "Complete ban on all GMOs",
                "No regulations at all",
                "Strict safety assessments and labeling requirements",
                "Unlimited use of GMOs without oversight",
                "Many countries implement rigorous safety assessments and labeling requirements to manage the risks associated with GMOs.",
                2
            ],
            [
                "What is a socioeconomic concern related to the use of GMOs:",
                "Increased small farmer independence",
                "Concentration of seed patents in large corporations",
                "Universal access to GMO seeds",
                "Decreased cost of seeds",
                "The control of seed patents by large corporations can limit access for small farmers and concentrate economic power.",
                1
            ],
            [
                "How can GMOs contribute to sustainable agriculture:",
                "By increasing the need for chemical fertilizers",
                "By enhancing soil degradation",
                "By reducing the need for tillage",
                "By increasing crop monoculture",
                "GMOs that are herbicide-tolerant can reduce the need for tillage, which helps preserve soil structure and reduce erosion",
                2
            ]
        ]
    ]

];
