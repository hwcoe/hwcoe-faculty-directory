TODO: bake in custom permalink structure for faculty-pg category (/%postname%/)
TODO: display feature image in place of ACF field upload, remove ACF field upload
TODO: display post title in place of ACF name field, remove ACF name field

# Faculty Directory

## Setup
1.	For each faculty member, create a new post. Make sure you update the permalink to show the URL structure lastname-firstname if you want the Faculty Directory display to be alphabetical by last name.
	⁃	Title: Faculty member’s name (this is what will display at the top of the page)
	⁃	Category: faculty-pg (choosing this category will automatically apply the Faculty Single Page post template)
	⁃	Be sure to upload a feature image, as this will display on the faculty directory, and also make sure to check "Hide Feature Image" under post options
	⁃	Fill out the corresponding details for your faculty
	⁃	When you are done, put whatever details you would like displayed on the faculty directory into the Excerpt area.
	⁃	For Example: 
		<a href="/anthony-lisa/">Lisa Anthony, Ph.D.</a>
		Assistant Professor
		352-505-1589
		E542 CSE
		<a href="mailto:lanthony@cise.ufl.edu">lanthony@cise.ufl.edu</a>

## Displaying a faculty directory
1.	Make sure the WP Show posts plugin is added
2.	Add a new WP Show Post list with the following settings
	⁃	Posts
		⁃	Post Type: post
		⁃	Taxonomy: category
		⁃	Terms: faculty-pg
		⁃	Posts per page: 70 (this depends on how many faculty you have and if you want this paginated.)
		⁃	Pagination: leave unchecked
	⁃	Columns
		⁃	Columns: 3 (works well with the HWCOE layout)
		⁃	Columns gutter: 2em
	⁃	Images (NOTE: these don't show up unless you upload a featured image to each faculty post)
		⁃	Images: checked
		⁃	Image width: 150
		⁃	Image height: 200
		⁃	Image Alignment: Center
		⁃	Image Location: Below Title
	⁃	Content
		⁃	Content Type: Excerpt
		⁃	Make sure all other fields are blank or unchecked. (NOTE: Nothing shows up from ACF fields)
	⁃	Meta
	⁃		All unchecked
	⁃	More Settings
		⁃	Order: Ascending
		⁃	Order by: Slug
		⁃	Status: Published
		⁃	Tax operator: IN
		⁃	No results message: Sorry, no posts were found
		⁃	Everything else is blank or unchecked.
3.	In the place where you want your faculty directory to show up, add the corresponding WP Show Posts shortcode.

