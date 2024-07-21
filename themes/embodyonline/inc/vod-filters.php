<?php
// Create Filters ?>
<div id="vod-filters">
  <h2>Filters <span class="arrow down-default"></span></h2>
  <div class="filters-wrap">
    <?php foreach( $GLOBALS['my_query_filters'] as $key => $name ):

      // get the field's settings without attempting to load a value
      $field = get_field_object($key, false, false);
      //var_dump($field);
      // set value if available
      if( isset($_GET[ $name ]) ) {
        //echo 'something isset';
        $field['value'] = explode(',', $_GET[ $name ]);
      }

      // create filter
      ?>
      <div class="filter" data-filter="<?php echo $name; ?>">
        <h4><?php echo $name; ?></h4>

        <?php create_field( $field );

        ?>

      </div>

    <?php endforeach; ?>
    <a id="applyFilters" class="button green-button">Apply Filters</a>
  </div><!-- /.filters-wrap -->

</div>

<script type="text/javascript">
(function($) {
  // Toggle Filters
  $('#vod-filters h2').on('click', function(){
    $('.filters-wrap').toggle('slow').css('display', 'flex');
    $('#vod-filters h2 span').toggleClass('up-green');
  });

  // change
  $('#vod-filters').on('change', 'input[type="radio"]', function(){

    // vars
    var url = '<?php echo home_url('vod'); ?>';
      args = {};

    // loop over filters
    $('#vod-filters .filter').each(function(){

      // vars
      var filter = $(this).data('filter'),
        vals = [];

      // find checked inputs
      $(this).find('input:checked').each(function(){
        vals.push( $(this).val() );
      });
      // append to args
      args[ filter ] = vals.join(',');
    });

    // update url
    url += '?';

    // loop over args
    $.each(args, function( name, value ){
      url += name + '=' + value + '&';
    });

    // remove last &
    url = url.slice(0, -1);
    // reload page
    $('a#applyFilters').on('click', function(){
      window.location.replace( url );
    });


  });

})(jQuery);
</script>
<?php
