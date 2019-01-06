<?php
//this code will be places in functions.php
add_action('add_meta_boxes','far_add_meta_boxes_property');
function far_add_meta_boxes_property(){
	add_meta_box(
	    'far-property-extra-info', //id of meta box
		 'Property Basic Information', // title of meta box
		 'far_property_imp_fields',  // callback function for input fields
		 'property', // post type
		 'side' , // position
		 'high' // priority
	);
}
//callback function for input fields
function far_property_imp_fields($post){
	?>
		<select id="owner_id" class="" name="owner_id">
		  <option value="">- Select -</option>
		<option value="'.$owner_id.'" '.$selected.'>'.$username.' - '.$owner_name.'</option>
		</select>

	        <input type="text" name="name" id="name" value="<?php echo get_post_meta($post->ID, 'name', true);?>">
	<?php
}
//for save data to database
add_action('save_post', 'far_save_database_property');
function far_save_database_property($post_id){		
  update_post_meta($post_id, 'owner_id', $_POST['owner_id']);
  update_post_meta($post_id, 'owner_id', $_POST['name']);
}
?>
