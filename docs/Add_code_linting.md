# Add code linting in VS Code

Add javascript linting: 
1. Install the jshint library `sudo npm install -g jshint`
2. Install `jshint` in VS Code extensions

Adding the WordPress Coding Standards WPCS when working in VS Code (on mac)
* Install [https://getcomposer.org/doc/00-intro.md](Composer)
* Install the phpcs extension in VS Code: 'phpcs'
* Add the latest WordPress Coding Standard (WPCS)  `npm install wpcs --save-dev`
* In the theme folder run: `composer global require "squizlabs/php_codesniffer=*"`
* Right click the wpcs folder in your node_Modules foler, replace /path/to/wpcs and run: `~/.composer/vendor/bin/phpcs --config-set installed_paths /path/to/wpcs`