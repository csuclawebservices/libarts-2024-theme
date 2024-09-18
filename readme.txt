=== Libarts 2024 Theme ===
Contributors: CLA Web Services
Requires at least: 6.6
Requires PHP: 8.1
Stable tag: 0.1.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html



== Description ==

The theme for all College of Liberal Arts websites.



== Changelog ==

= 0.4.0 - 2024-08-30 =
* Added: A "Sub Heading" block variation of the "Heading" block that has the "Bodoni" font family by default and font size of "200"
* Added: core/group "Decoration" dropdown to the Block Controls toolbar to allow adding a decoration (such as "Linework Enclosed") while still being able to use block styles for themed colors.
* Added: core/group "Responsive" tools panel to the Inspector Controls styles to allow adding responsive padding and margin values that automatically adjust at different breakpoint sizes
* Added: src/editor which is used to generate the assets/js/editor.js file which combines all non-block editor scripts into one. Includes scripts such as block variations, unregistering core block styles, the new "Decorations" drop down menu for the core/group block, the new "Responsive" Inspector Controls Tools Panel that adds responsive padding and margin options to the core/group block, and a new utils.js script.
* Updated: The cla/header block file naming to match that of the official block structure documentation
* Updated: Added some Theme methods to set the default page template to be "blank" instead of the default that includes the featured image, page title, and breadcrumbs
* Updated: core/paragraph CSS to allow for <p> tags and <span> tags since the new cla-blocks/heading-group converts all tags within it to <span> tags.

= 0.3.0 - 2024-08-27 =
* Added: A filter to set default block setting values (for attributes), specifically for the core/spacer block.
* Updated: cla-blocks/call-to-action CSS to improve button/arrow appearance and overall interactive state appearance
* Updated: The footer.php pattern so that some columns stacked on mobile and some didn't

= 0.2.0 - 2024-08-26 =
* Added: A footer pattern file to be used as the default for all sites.
* Updated: The core/site-logo to add new Block Styles so the SVG can be forced to display as the "Stacked" or "Acronym" layout.

= 0.1.0 - 2024-08-23 =
* Initial release



== Upgrade Notice ==

= 0.1.0 =
* Initial release