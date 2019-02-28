# Displaying Posts from Multiple Sites for a Writing Portfolio with the WordPress REST API

When you blog regularly for multiple sites, collecting your posts and manually adding them to a portfolio becomes a tedious chore. It is something I never get around to, even though I love seeing a lists of my posts all in one place.

So I thought, is this something I can do with the WordPres REST API? Could I take the data from three different sites and display a list on one page that updates itself?

Why yes, yes you can. [Here it is](https://feliciaceballos.com/writing/). This is how you can recreate this if you’re using the Genesis framework.

## Step 1: Copy the page_index.php file
The page_index.php file is different from your site’s main index.php file. The page _index.php file in Genesis shows a lists of posts, categories, authors and tags.

In your theme files, copy and rename the page_index.php file

I renamed mine page_writing_index.php. Make sure you also change the template name.

## Step 2: Modify Your functions.php file
I followed Misha Rudrastyh’s tutorial: [Begin with REST API – Display others blogs latest posts](https://rudrastyh.com/wordpress/rest-api-get-posts.html).

I write for three blogs:

- My personal blog
- WPMU DEV
- Green Cottage Joy

So I modified Misha’s code by adding a section for a 3rd blog and added it to the bottom of my functions.php file in WordPress.

I used the WP REST API to only retrieve my blog posts from WPMU DEV since there are multiple authors, as well as a limited amount of posts from my other two sites.

I also modified the output so that each blog post is clickable and takes you to the full post, and displays the date.


## Step 3: Create a New Page and Select the New Template
Once you’re finished with that, create a new page in WordPress and select Writing Index (or whatever you named your template) from the Page Attributes section.

I used a Gutenberg block to add a brief intro to the list of blog posts and then published it. Boom! An auto updating list of blog posts from all the blogs I write for. If I start writing for another blog, all I need to do is add a section for a fourth blog to my functions.php file.

If you want to see what the page looks like, go to [feliciaceballos.com/writing](https://feliciaceballos.com/writing/).

To read the full blog post, visit [feliciaceballos.com](https://feliciaceballos.com/displaying-posts-from-multiple-sites-for-a-writing-portfolio-with-the-wordpress-rest-api/)
