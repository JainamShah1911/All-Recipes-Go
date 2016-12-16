=== Cooked Recipe Plugin ===
Donate link: https://boxystudio.com/#coffee
Tags: recipe, recipes
Requires at least: 4.0
Tested up to: 4.6.1
Stable tag: 4.6.1

A super-powered recipe plugin for WordPress.

== Changelog ==

= 2.4.1 =
* *FIX:* A quick fix for Full-Screen mode.
* *FIX:* Fixed a PHP Warning on some pages.

= 2.4.0 =
* **IMPORTANT:** The "Browse Recipes" page now needs a `[cooked-browse]` shortcode on it. It will simply load this page content, so feel free to add any content you'd like above or below the shortcode!
* **IMPORTANT:** The "Profile" page now needs a `[cooked-profile]` shortcode on it. It will simply load this page content, so feel free to add any content you'd like above or below the shortcode!
* **NEW:** Cooked no longer requires a page template to display your recipes. It will simply replace the content area of the default post template.
* **NEW:** Support for WordPress 4.6!
* *FIX:* Fixed the pagination bug.
* *FIX:* Lots of other little bug fixes throughout.

= 2.3.11 =
* **NEW:** The Short Description and Additional Notes fields are now full text editors.
* **NEW:** Added option to disable the "Account" tab on the Profile page (WooCommerce)
* **NEW:** Added option to hide the Ingredient checkboxes.
* **NEW:** Added option to hide the Direction step numbers.
* *FIX:* Google Structured Data issues have been resolved.

= 2.3.10 =
* *FIX:* Fixed a few issues with tags.
* *FIX:* Fixed an issue with the recipes overlapping eachother on load.

= 2.3.9 =
* *FIX:* Updated to support WordPress 4.5.
* *FIX:* Fixed the Pinterest sharing description issue.
* *FIX:* Added "Share" to Facebook like button.
* *FIX:* Searching for recipe tags now functions properly!
* *FIX:* FontAwesome updated to 4.6.

= 2.3.8 =
* *FIX:* Fixed a Structured Data issue for recipes with no reviews.

= 2.3.7 =
* *FIX:* Address an XSS vulnerability. Huge thank you to [Ardalan Naghshineh from Curious Communications](http://curious.agency)!

= 2.3.6 =
* *FIX:* Fixed an issue where the [cooked-browse] shortcode wasn't working on Posts.

= 2.3.5 =
* *FIX:* Fixed an IE issue with the taxonomy select boxes on the Submit a Recipe form.
* *FIX:* Fixed some shortcode conflicts with certain themes.

= 2.3.4 =
* *FIX:* Meta description now uses Excerpt instead of Short Description.
* *FIX:* Meta description now disables HTML to prevent broken headers.
* *FIX:* Recipe measurement "count" text is now hidden on the recipe. ("2 bay leaves" instead of "2 count bay leaves")

= 2.3.3 =
* *FIX:* Fixed an issue with the Recipe Builder where items were being removed and/or reordered.

= 2.3.2 =
* **NEW:** FitVids now loads with the plugin to prevent video squishing on mobile.

= 2.3.1 =
* *FIX:* Fixed a small issue where errors wouldn't show up when editing a profile.
* **NEW:** [DEVELOPERS] Added filters for the image sizes so they can be adjusted (cp_image_size_large_width, cp_image_size_large_height, cp_image_size_medium_width, cp_image_size_medium_height, cp_image_size_small_width, cp_image_size_small_height)
* **NEW:** New plugin update server has been implemented.

= 2.3.0 =
* **NEW:** Direction images will now open a larger version when clicked.
* **NEW:** Added default Category, Cuisine, Cooking Method and Sorting options for the "Browse Recipes Page" display.
* **NEW:** A very obvious full-screen popup now displays when a timer is complete.
* **NEW:** Replaced recipe Direction checkboxes with numbers.
* **NEW:** Administrators and Recipe Contributors can now comment on their own recipes (Administrators on any recipe) WITHOUT needing to leave a star rating.
* **NEW:** Added a setting to fix a duplicate comments issue with some themes.
* **NEW:** "Detailed Mode" is now the default view in the backend recipe editor.
* **NEW:** Removed images completely from print view to save space.
* **NEW:** [DEVELOPERS] Added a "cp_social_sharing_links" filter to replace social sharing links on top of recipes with your own.
* *FIX:* Fixed a bug when searching for recipes from a recipe page other than the first page.
* *FIX:* Fixed the Google Structured Data error with recipe reviews.

= 2.2.3 =
* *FIX:* Fixed a bug when using both "Visual Composer" and "Yoast SEO" with Cooked.
* *FIX:* Fixed a bug where archive pages didn't work for some recipe list templates.

= 2.2.2 =
* *FIX:* Fixed a bug in the Cooked email function.

= 2.2.1 =
* *FIX:* Fixed a bug when updating the settings page.

= 2.2.0 =
* Cleaned and reorganized the file structure.
* In this cleanup release, all recipe queries have been adjusted to use WP_Query() instead of query_posts().
* Cleared out unused images and switched some images to FontAwesome icons.
* Moved Social Buttons and Recipe Actions to a section above the recipe to fix the Facebook popup issue.
* Updated language file.
* *FIX:* Fixed a bug with [cooked-recipe] and [cooked-recipe-card] where the author name would show incorrectly.

= 2.1.7 =
* *FIX:* Fixed a PHP error showing up on some installations.

= 2.1.6 =
This version of Cooked fixes a few bugs and simplifies several aspects of the plugin. Please review the following carefully before updating so you know what has been changed and/or removed.

* **CHANGED:** Replaced somewhat broken "SHARE" button with standard social buttons.
* **REMOVED:** Responsive Breakpoint settings.
* *FIX:* Fixed some masonry recipe layout issues (especially at smaller sizes).
* *FIX:* Fixed the "Email" button.
* *FIX:* Fixed a recipe tags issue.

= 2.1.5 =
* *FIX:* Fixed an issue where "Prep" and "Cook" titles would show up even if no times were entered.
* *FIX:* Broken "full-screen" and "favorite" options removed from embedded recipes.
* *FIX:* Fixed some more email encoding issues.
* *FIX:* Fixed some other buggy things.

= 2.1.4 =
* *FIX:* Security update to remove the *add_query_arg()* and *remove_query_arg()* vulnerability.

= 2.1.3 =
* *FIX:* Fixed some encoding issues with emails being sent out.
* *FIX:* Fixed an issue where the password would be reset (and broken) when updating a profile.

= 2.1.2 =
* *FIX:* Fixed an issue with the new prep/cook sliders (Firefox) and the time display.

= 2.1.1 =
* **NEW:** Added two checkboxes to show/hide the "Website" and "Short Bio" in the user profile.
* *FIX:* Fixed an issue where cook/prep times were not showing up.
* *FIX:* Rearranged the Submit a Recipe form putting more important items at the top.
* *FIX:* Removed the custom select box styles throughout, it was messing with too many themes.
* *FIX:* Fixed an issue in IE 11 where you could choose the recipe template in the Settings panel.
* *FIX:* Replaced the jQuery UI drag slider with a mobile-friendly one (front-end).
* *FIX:* Fixed an issue where admin ratings were not displaying.
* *FIX:* Fixed an issue where the recipe panels would not align properly on smaller pages.
* *FIX:* Fixed the recipe widget to show top rated recipes in the correct order.

= 2.1 =

* **NEW:** Added a new Reviews & Comments option for **"Admin Reviews w/Default WordPress Comments"** to allow default commenting (so you can enable *Disqus* comments, etc.)
* *FIX:* Stopped saving ingredients as posts. This was causing a lot of issues with the Detailed Entry mode. The instant ingredient search won't work anymore, but it was a needed trade-off.
* *FIX:* Lots of translation issues throughout, be sure to update your language files for the new strings!
* *FIX:* Stylistic issues fixed throughout.
* *FIX:* Lots of bug fixes throughout.

= 2.0.3 =
* *FIX:* Did some CSS reworking to hopefully fix some stylistic issues with certain themes.
* *FIX:* Fixed the video lightbox sizing issue.

= 2.0.2 =
* *FIX:* Removed "Total Time" to display both the "Prep" and "Cook" times instead.
* *FIX:* Added "Yields:" text next to the "Yields" value.
* *FIX:* Fixed an issue where recipe meta values would get deleted in Quick Edit mode.
* *FIX:* Adjusted the size of the rating stars to fit better on all screen sizes.

= 2.0.1 =
* *FIX:* Fixed a profile link issue with usernames containing a period and/or underscore.
* *FIX:* Fixed an issue with the max cook/prep time sliders in the Settings panel.
* *FIX:* Fixed an issue where child themes would not display the chosen recipe template properly.
* *FIX:* Fixed some styling issues with the Pending list.
* *FIX:* Fixed an issue with the Pending count showing up in the wrong spot.
* *FIX:* Fixed an issue with direction images getting stretched.

= 2.0.0 =
**Cooked 2.0 is here!**
This is a huge update! Check out the list of new features and fixes below:

* **NEW:** Added a **"Detailed Entry"** mode to both the ingredients and recipe directions for admin-created recipes. Includes the much requested "Image Per Direction" feature!
* **NEW:** The **Recipe RSS Feed** got a *major* overhaul. It now includes the image, serving size, short description, ingredients, directions and additional notes.
* **NEW:** Drastically improved the **Recipe Search Capabilities**. It is *much* faster and more accurate now.
* **NEW:** Added a **custom email template** with the ability to customize the email header image/content.
* **NEW:** Added a **"Pending Recipes"** page to quickly view and approve/delete incoming recipes.
* **NEW:** Added a **"Recipe Limit"** to limit the number of recipes a user can submit.
* **NEW:** Added an **"Auto-Publish"** option to allow users to submit recipes that are automatically published to the site.
* **NEW:** Added support for the **"Really Simple CAPTCHA"** plugin to add captchas to registration and recipe submission forms. Just install and activate!
* **NEW:** Updated the registration form to simply ask for "First Name", "Last Name" and "Email". It now sets up an account and sends the user a welcome email.
* **NEW:** Added an option to change the category, cuisine and cooking method slugs.
* **NEW:** Added an option to make the star rating optional.
* **NEW:** Added new attributes to the [cooked-browse] shortcode to filter by category, cuisine and/or cooking method. You can set the sort order as well!
* *FIX:* Admins can now set ratings to zero again (if Admin Reviews is turned on).
* *FIX:* The "Receipe Excerpt" is now saved as the "post_excerpt" for full excerpt support (with RSS feeds and other plugins, etc.)
* *FIX:* Fixed an issue where the "Display Name" wasn't showing properly in comments, etc.
* *FIX:* Fixed an issue when a user registers with a space in the username, it breaks the profile page.
* *FIX:* Recipe image now shows up in print view.

= 1.4.6 =
* *FIX:* Fixed an issue where in rare cases a user's profile link wouldn't work.
* *FIX:* Fixed an issue with the "Print" button not working in Cooked shortcodes.

= 1.4.5 =
* *FIX:* Fixed a registration issue from 1.4.4, sorry about that!

= 1.4.4 =
* **NEW:** Moved recipe images to use Featured Image instead of a custom image field.
* **NEW:** Added thumbnails to Recipe post list in the admin.
* **NEW:** Added an "Excerpt" field (replaces the "Short Description" on the list views if entered)
* *FIX:* Added more missing translations.
* *FIX:* Fixed login redirect with invalid credentials.
* Much bigger updates coming soon!

= 1.4.3 =
* *FIX:* Fixed a pagination issue on the archive pages.

= 1.4.2 =
* *FIX:* Hide the "Edit Recipe" block on print screen
* *FIX:* Now showing empty categories, cuisines, and cooking methods as options in the submit recipe form.
* *FIX:* Made the cook times NOT required in the submit recipe form.

= 1.4.1 =
* **NEW:** New "horizontal" recipe card style shortcode (add style="horizontal" to the shortcode).
* *FIX:* Private recipes are now hidden from widgets.
* *FIX:* Fixed an issue where the search box would not work properly when two of them were on one page.
* *FIX:* Moved the customization CSS files to the uploads folder so the plugin files don't need to be writeable anymore.
* *FIX:* Fixed the pagination on Recipe archives (category, cuisine, cooking method).

= 1.4 =
* **NEW:** Users can now edit their own recipes.
* **NEW:** Users can now make their own recipes "public" or "private".
* **NEW:** Added custom upload field styling.
* **NEW:** Added a [cooked-recipe-card id=1234] shortcode for displaying a recipe card anywhere.
* **NEW:** Added a "stacked" option to the [cooked-search style="stacked"] shortcode option to show a stacked search box.
* **NEW:** Added a new widget to display the recipe search box (in stacked style).
* **NEW:** Re-coded register form to include a password field.
* **NEW:** Removed the color scheme functionality and replaced it with WordPress color pickers.
* **NEW:** If you choose to hide certain elements, those related fields will now also be hidden on the front-end submit form.
* **NEW:** Moved reviews above the review comment box instead of below.
* **NEW:** Reviewer names are now linked to their profile (if they are a registered member and a profile page is selected in the settings).
* *FIX:* Fixed messy dropdown arrows on iOS devices.
* *FIX:* Made the review avatars match the custom user avatar (if one is available).

= 1.3.1 =
* *FIX:* Fixed an issue where the taxonomies wouldn't get saved from a front-end submission.
* *FIX:* Fixed an issue where the Nutrition Facts were overlayed in print-mode.

= 1.3 =
* **NEW:** Added the [cooked-search] shortcode to display the recipe search box anywhere you need it.
* **NEW:** Added the [cooked-directory] shortcode. You can now display a list of all users that shows number of recipes, favorites, reviews, etc.
* **NEW:** Users can now update their avatar from the Edit Profile tab.
* **NEW:** You can choose to show the author's avatar next to their name on recipes.
* **NEW:** The front-end submission form now allows more than one selection for category, cuisine and cooking methods.
* **NEW:** Added default "blank" images for recipes without images.
* **NEW:** Print button now opens in a new window for better printing.
* **NEW:** Added two new recipe layouts for page templates with sidebars.
* *FIX:* Added a few missing translations.

= 1.2.7 =
* FIXED: An issue where in some themes (including Basil), the recipe image would disappear at certain widths.
* Many more updates coming in v1.3, this is just a minor release. :)

= 1.2.5 =
* **NEW:** Added options to set the max times for Prep and Cook time sliders.
* FIXED: You can now use ANY page slug for the Profile page (not just /profile/).
* FIXED: Masonry layouts now work in areas less than 900px.
* FIXED: A small checkbox issue in the Settings screen.

= 1.2 =
* **NEW:** Added some widgets! Single Recipe and Recipe List with sorting options.
* **NEW:** Added Difficulty Levels (Beginner, Intermediate, and Advanced)
* **NEW:** Added the ability to hide/show Category, Cuisine, and/or Cooking Method
* **NEW:** Added a field for "Additional Recipe Notes" for displaying sources, cooking tips, etc.
* **NEW:** Added shortcodes to display the Recipe Browser, Profile and a Single Recipe.
* **NEW:** Added the option to make recipe actions (print, favorite, full-screen) "Premium" features, which means the user is required to be logged in to use them.
* **NEW:** Added WooCommerce integration. If you have WooCommerce installed and active, the "My Account" page content will show up as a tab on the Profile template.
* **NEW:** Added recipe tag support.

= 1.1.03 =
* More bug fixes related to commenting

= 1.1.02 =
* Some quick bug fixes

= 1.1.0 =
* **NEW:** Front-End Submissions (includes a setting to choose the user roles who have access and a custom form for submissions).
* **NEW:** User Profiles that can display submitted recipes, recent reviews and a favorites list.
* **NEW:** An "Edit Profile" tab on the Profile page for logged in users to edit their name, email, website, bio, and update their password if needed.
* **NEW:** Added video support to recipes. Just add a video link and it will add a lightbox video popup icon to the recipe image.
* **NEW:** Added a [cooked-login] shortcode to display a login form. Great for the default Profile page.
* **NEW:** Added a “Nutrition Facts” block.
* **NEW:** Added options to toggle certain recipe information items like rating, timing, categories, etc.
* **NEW:** Added a bunch of Rich Snippet improvements. Your recipes will now show up with a photo, rating and more in search results!
* **NEW:** Added the ability to change the "recipe" slug in the URL to something else entirely.
* **NEW:** New Settings panel with tabbed interface.
* *FIX:* Fixed issue with the pagination when Browse Recipes view is set as the homepage.
* *FIX:* Fixed the update conflict with free "Cooked" plugin on WordPress.org, sorry about that!
* Minor stylistic updates throughout.

= 1.0.2 =
* Fixed issue where it would always show the recipe template on a single post

= 1.0.1 =
* Some quick bug fixes

= 1.0.0 =
* Initial Release!