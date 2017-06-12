=== Positor ===
Contributors: Ole Kristan Losvik
Tags: Bootstrap 4

Requires at least: 4.4.0
Tested up to: 4.7.0
Stable tag: 1.0.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

== Description ==

A minimalistic theme with a clean design giving focus to your content. Theme is built on Bootstrap 4.

== Installation ==

1. In your admin panel, go to Appearance > Themes and click the Add New button.
2. Click Upload and Choose File, then select the theme's .zip file. Click Install Now.
3. Click Activate to use your new theme right away.

Custom fields used in this theme: 
* Issue number for showing if the article was published in a printed issue: issue_number
* Author alias for showing an author not registed as a user in WordPress: author_alias
* Author bio for authors not registered as a user: author_bio


== Frequently Asked Questions ==

= Where can i find the source code and sass files? =

Positor and it´s full source code is available at [GitHub](https://github.com/losol/positor).



== Changelog ==

= 1.0 - 05.05.2017 =
* Initial release

= 1.0.1 - 06.05.2017 =
* Added norwegian translation.

= 1.0.2 - 07.05.2017
* Better build structure

= 1.0.3 - 07.05.2017
* Fix of social media link variable giving notice. 
* Better spacing in sidebar widgets
* Fixed menu containing way too many or long elements

= 1.0.4 - 09.05.2017
* Showing social icons and related posts if Jetpack is installed and functions enabled.
* Showing post meta information: author, photographer, tags, categories
* Showing issue number for articles published in print magazine.

= 1.0.5 - 10.05.2017
* Added woocommerce support

= 1.0.6 - 12.05.2017
* Automatic choose between manual excerpt (first choice), teaser (text before more) and automatic excerpt.

= 1.1.0 - 31.05.2017
* Added video post format
* Automatic plugin recommandation of Advanced custom fields

= 1.1.1 - 05.06.2017
* Added comments functionality
* Fix of widgets in sidebar

= 1.1.2 - 05.06.2017
* Added more translated texts

== Credits ==
* Based on https://github.com/Automattic/theme-components/, (C) 2015-2016 Automattic, Inc., [GPLv2 or later](https://www.gnu.org/licenses/gpl-2.0.html)
* Bootstrap (http://getbootstrap.com/) licensed under MIT license (https://github.com/twbs/bootstrap/blob/master/LICENSE)
* normalize.css (http://necolas.github.io/normalize.css/), (C) 2012-2016 Nicolas Gallagher and Jonathan Neal, [MIT](http://opensource.org/licenses/MIT)
* bs4navwalker (https://github.com/dominicbusinaro/bs4navwalker) by Dominic Businaro - @dominicbusinaro, [GPLv2 or later](https://www.gnu.org/licenses/gpl-2.0.html)
* FontAwesome (http://fontawesome.io) licensed under the SIL OFL 1.1 (http://scripts.sil.org/OFL)
* TGM-Plugin-Activation (https://github.com/TGMPA/TGM-Plugin-Activation) by Thomas Griffin, Gary Jones, Juliette Reinders Folmer,[GPLv2 or later](https://www.gnu.org/licenses/gpl-2.0.html)
* Advanced custom fields (https://www.advancedcustomfields.com/) by Elliot Condon, [GPLv2 or later](https://www.gnu.org/licenses/gpl-2.0.html)


Edits based on user feedback from @joyously 
* Changed from required to recommended plugin for Advanced Custom Fields 
* Added a menu fallback with a button for adding a new menu if no menu is assigned in the top bar
* Corrected sidebar being way too small on pages. 
* Now shows users chosen avatars
* Hide social links if empty


Not taken into account: 
* I was looking at why the footer shows the site title twice, and saw that you are naming classes for styles, such as 'text-muted' and 'text-white'. This is not a good idea in an environment where child themes and users can change styles and colors easily. It is better to name classes using nouns instead of adjectives.