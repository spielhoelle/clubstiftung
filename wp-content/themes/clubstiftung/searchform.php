<?php
/**
 *	The template for displaying the search form in sidebar.
 *
 *	@package WordPress
 *	@subpackage clubstiftung
 */
?>
<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
    <div class="search-form-box">
    	<input type="submit" id="searchsubmit" value="" />
      <i class="fa fa-search"></i>
        <input type="search" id="s" placeholder="<?php echo __( 'Search...', 'clubstiftung' ); ?>" value="<?php echo esc_attr(get_search_query()); ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label', 'clubstiftung' ); ?>" />
    </div><!--/.search-form-box-->
</form><!--/.search-form-->
