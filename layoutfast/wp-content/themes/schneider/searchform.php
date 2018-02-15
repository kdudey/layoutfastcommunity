<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>" id="searchform">
    <div class="input-group mb-3">
	  <input type="search" class="search-field form-control" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'schneider' ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>" name="s" title="<?php _ex( 'Search for:', 'label', 'schneider' ); ?>">
	  <div class="input-group-append">
	    <button class="search-submit btn btn-default" type="button" onclick="document.getElementById('searchform').submit();"><i class="fa fa-search"></i></button>
	  </div>
	</div>
</form>



