

Adding the WordPress Coding Standards WPCS when working in VS Code (on mac)
* Install the phpcs extension
* Download the latest WPCS [https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/releases/](WPCS)
* In the theme folder run: `composer global require "squizlabs/php_codesniffer=2.9.1"`
* Then run: `~/.composer/vendor/bin/phpcs --config-set installed_paths /path/to/wpcs`