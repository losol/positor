# Adding Travis

1. Get an Travis account. Sign in to [https://travis-ci.org/](Travis CI) with your GitHub account, accept the GitHub access permissions confirmation. If you have an organisation, you might grant access to this as well. 
2. Enable your repository to Travis. 
3. Add a Travis file to your repository. https://github.com/WordPress/twentyseventeen/blob/master/.travis.yml. Add this to your themes root folder. 
4. In .travis.yml change the PHP Codesniffer version to 2.9.1 by editing to: https://github.com/squizlabs/PHP_CodeSniffer/archive/2.9.1.tar.gz
5. Add .jscsrc and .jshintignore, sample files in Twenty Seventeen. 
4. Push to update the repository. Travis will only run builds after it is enabled. 

2. Add a ruleset for automatic sniffing: https://github.com/WordPress/twentyseventeen/blob/master/codesniffer.ruleset.xml 
3. Get an account: https://travis-ci.org/


## Sources
* https://shubhampandey.in/integrating-travis-ci-wordpress-theme/c
