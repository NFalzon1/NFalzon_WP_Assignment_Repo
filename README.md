WordPress School Theme Development

This theme was developed to help colleges and schools to have a decent WordPress theme. Two software which were used to create this team was Local and Visual Studio Code. The below information is all about the functions, customisability options and template-parts which were created to develop this theme.

--Customize.php--

Each section of the customise options are listed with the term add_sections and every section has a title and a description. Also, each customisability option has a control (add_control) and a setting (add_setting). The controllers which were used in this theme were: WP_Customize_Color_Control and the Select option controller which were used as drop-down menus. 

NB: To add a control option to a section, one needs to write down the name of the section in the section parameter in the controller. Also, the title of the control and setting needs to be the same in order to work.

--Enqueue-assets.php--

This file imports all of the css and js files and automatically injects them into all of the pages.


--Template-parts - ArchiveLoop.php--

This displays all of the information of the author.

--Content.php--

This file displays how the content is going to be styled and shown to the user. The two lines of php is simply to import the customisability options of the button colours.

--Template-blog-archive.php / Template-prs-archive.php --

This template file is seen in the blog feature of the theme and shows the most recent posts available. Multiple customisibility options are imported and used. The sidebar can only be seen in the blog pages (if the user wants to, since this can also be removed in the customizer)

The difference between the two templates are the types of posts they are showing. (The blog-archive is showing the blogs, whilst the prs-archive is showing only the press releases)

--Search.php--

This file is used to redirect the user once the search button is clicked. Afterwards, the user is redirected to the homepage and shows the search result. The results are stylised by the template part called, loop.php.

--Sidebar.php--

This displays the selected sidebar. This is customised in the WordPress admin panel. One can find it in the Widgets in the Appearance panel.

The information mentioned above, can be said for the files which are listed below:
	
	1. Sidebar-second.php
	2. Sidebar-footer-1.php
	3. Sidebar-footer-2.php
	4. Sidebar-footer-3.php

--Single-courses.php & single-prs.php--

These two single pages are used to display the post of the blog and the press release respectively. There are slight differences in the styling of the page.


--Functions.php--

1. The first function (classExample_h6title) automatically adds an h6 tag to every title in the website.
2. The second function (classExample_excerptLength) changes the amount of words which are shown in the excerpt.
3. The third function (classExample_themefooter) adds a container underneath every page with the copyright information. Two colour controllers were used to determine the colours of both the background colour and text. (This can be selected by the user).
4. The fourth function (classexample_postorderasc) automatically changes the order of every post to ascending order.
5. The fifth function (diwp_theme_customizer_options) is used to add import a logo or image to the website. The imported image or logo is used in the navigation bar. A customisability option was made to select the placement of the logo (top or on the left).
6. The sixth function (set_featured_image_for_press_releases) is a function which automatically determines all of the featured images of the press releases of the site. The image which was selected, was the logo or images imported by the user. This import was done by the fifth function (diwp_theme_customizer_options).

The three functions which will be mentioned are related to the course menu.

1. The function "add_course_menu" is used to create the menu of the course, and six criteria were needed to be added in order to create the menu.
2. The second function "courses_menu_page" starts with an HTML form with the criteria which is used to be stored on the website. Secondly, underneath the Course Category tag, a php tag was opened in order to load in the taxonomy of the categories of the courses and the name of the category had to be loaded in by using PHP.
3. The last function "handle_new_course__submission" is used to store the information from the form to the website. This was made by a redirection to a new course page with all the stored information loaded in.






 
