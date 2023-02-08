<?php

// Meta Box

function members_metabox_field(){
 
    add_meta_box(
            'members-metabox-field',
            'Member Setting',
            'add_member_field',
            'members'
        );
}
add_action('add_meta_boxes', 'members_metabox_field');


// Add Field
function add_member_field(){ 
    global $post; 
    // Get Value of Fields From Database
    $membertitle = get_post_meta( $post->ID, 'membertitle', true);   
?>     
<div class="row">
    <div class="label"><b>Job Title</div>
    <div class="fields"><input style="width:50%" type="text" name="membertitle" value="<?php echo $membertitle; ?>"></div>
</div>
<?php    
}

// Saved Field

function save_member_field_metabox(){
     global $post;
 
    if(isset($_POST["membertitle"])) :
        update_post_meta($post->ID, 'membertitle', $_POST["membertitle"]);
    endif;

} 
add_action('save_post', 'save_member_field_metabox');

// Display Field

function output_content_before_cpt_content($content) {
	global $post;
    global $post_type;
       
    if( 'members' == $post_type ) { 
        
        $featured_img_url = get_the_post_thumbnail_url($post->ID,'thumbnail');
  
        $membercontent .= '<div class="member-wrap">';
     if( is_singular('members') && !empty($featured_img_url) ) {
        $membercontent .= '<img src="'. esc_attr($featured_img_url) .'" alt="" class="alignleft post-image">';
    }
     elseif( is_archive('members') && !empty($featured_img_url) ) {
        $membercontent .= '<a href="'.get_the_permalink($post->ID).'"><img src="'. $featured_img_url .'" alt="" class="alignleft post-image"></a>';
        }
    else {
        $membercontent .= '';
      }
    if( is_archive('members')) {
        $membercontent .= '<p class="member-name"><a href="'.get_the_permalink($post->ID).'">'.get_the_title($post->ID).'</a></p>';
    }
    else {
        $membercontent .= '<p class="member-name">'.get_the_title($post->ID).'</p>';
    }
		$membercontent .= '<p class="job-title">'.get_post_meta( $post->ID, 'membertitle', true).'</p>';
        $membercontent .= '<p class="excerpt">'. get_the_excerpt($post->ID).'</p>';
        $membercontent .= '</div>';
        return $membercontent;
    }

    else {
        return $content;
     }
}

add_filter( 'the_content', 'output_content_before_cpt_content', 1 );

function my_post_image_html( $html, $post_id, $post_image_id ) {
	if(is_archive('members')) {
		return '';
	} else
	
	return $html;
}
add_filter( 'wp_get_attachment_image', 'my_post_image_html', 10, 3 );
// Remove default post thumbnail

