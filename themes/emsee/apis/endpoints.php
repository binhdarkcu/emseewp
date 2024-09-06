<?php

add_action('rest_api_init', function () {
    register_rest_route('custom/v1', '/posts/', array(
        'methods' => 'GET',
        'callback' => 'get_posts_by_category',
        'permission_callback' => '__return_true',
    ));
});

function get_posts_by_category($request) {
    $category = $request->get_param('category'); // Get the category parameter from the request
    $page = $request->get_param('page') ? intval($request->get_param('page')) : 1; // Get the page number, default to 1
    $per_page = $request->get_param('per_page') ? intval($request->get_param('per_page')) : 10; // Get the number of posts per page, default to 10

    // Define query arguments
    $args = array(
        'post_type' => 'post',  // You can change this to your custom post type if needed
        'posts_per_page' => $per_page,  // Number of posts per page
        'paged' => $page,  // Current page
        'category_name' => $category,  // Filter by category slug
        'post_status' => 'publish'  // Only get published posts
    );

    // Execute the query
    $query = new WP_Query($args);
    $posts = $query->posts;

    // Prepare the response
    $response = array();
    $response['posts'] = array();

    if (!empty($posts)) {
        foreach ($posts as $post) {
            // Get the permalink
            $permalink = get_permalink($post->ID);

            // Get the featured image URL
            $featured_image = get_the_post_thumbnail_url($post->ID, 'full'); // 'full' can be changed to other sizes like 'thumbnail', 'medium', etc.
            $category = get_the_category($post->ID);
            $response['posts'][] = array(
                'id' => $post->ID,
                'title' => $post->post_title,
                'content' => $post->post_content,
                'permalink' => $permalink,
                'featured_image' => $featured_image,
                'category' => array(
                    'term_id' => $category[0]->term_id,
                    'name' => $category[0]->name
                ),
                'date' => $post->post_date
            );
        }
    }

    // Add pagination information to the response
    $response['current_page'] = $page;
    $response['total_pages'] = $query->max_num_pages;
    $response['total_posts'] = $query->found_posts;

    return new WP_REST_Response($response, 200);
}
