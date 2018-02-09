<!-- #Container Area -->
	<?php 
		$category= get_queried_object();
		$cat_id = $category->term_id; 
		$cat_nm = $category->name; 

	$wcatTerms = get_terms('product_cat',
		array(
			'hide_empty' => false,
			'orderby' => 'name',
			'parent' => 0,
		)
	);
	$term_arr = array();
	
	foreach($wcatTerms as $wcatTerm){
		$t_id = $wcatTerm->term_id;
		$variable = get_field('_is_bundled_cat', 'product_cat_'.$t_id);
		if($variable == 'Yes'){
			$term_arr[$wcatTerm->term_id] = $wcatTerm->term_id;
		}
	}

	if(in_array($cat_id,$term_arr)){
		include('product-archive/door-archive.php');
 	} 
	else{
		include('product-archive/store-archive.php');
	}

 ?>