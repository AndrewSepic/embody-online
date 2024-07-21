<?php
// Create Filters ?>
<div id="vod-filters">
  <h2>Filters <span class="arrow down-default"></span></h2>
  <div class="filters-wrap">
    <div class="filters">
    <?php foreach( $GLOBALS['my_query_filters'] as $key => $name ):

      // get the field's settings without attempting to load a value
      $field = get_field_object($key, false, false);
      //var_dump($field);
      // set value if available
      if( isset($_GET[ $name ]) ) {
        //echo 'something isset';
        $field['value'] = explode(',', $_GET[ $name ]);
        $currentArray = $field['value'];
        //var_dump($field); ?>

        <div class="filter" data-filter="<?php echo $name; ?>">
          <h4><?php echo $name; ?></h4>
          <ul> <?php
          foreach( $field['choices'] as $choice_value => $choice_label): ?>
          <li>
            <input type="checkbox" value="<?php echo $choice_value;?>" <?php if (in_array($choice_value, $currentArray )):?>checked="checked"<?php endif;?>/> <?php echo $choice_label;?></li>
          <?php endforeach;?>
          </ul>
        </div>
          <?php
      }
      else {
        //echo 'nothing isset';
        $field['value'] = explode(',', $_GET[ $name ]);
        $currentArray = $field['value'];
        //var_dump($field);?>

        <div class="filter" data-filter="<?php echo $name; ?>">
          <h4><?php echo $name; ?></h4>
          <ul> <?php
          foreach( $field['choices'] as $choice_value => $choice_label): ?>
          <li>
            <input type="checkbox" value="<?php echo $choice_value;?>"/> <?php echo $choice_label;?></li>
          <?php endforeach;?>
          </ul>
        </div>
          <?php
      }

      // create filter
      ?>
      <!-- <div class="filter" data-filter="<?php// echo $name; ?>">
        <h4><?php// echo $name; ?></h4>

        <?php// create_field( $field );

        ?>

      </div> -->

    <?php endforeach; ?>
    <a id="applyFilters" class="button green-button">Apply Filters</a>
    </div><!-- /.filters -->
  </div><!-- /.filters-wrap -->

  <script>
  jQuery( document ).ready(function( $ ) {

    // Rename Class_Level to Class Level
    $('#vod-filters .filter:first-child h4').text('Class Level');

    // Toggle Filters
    $('#vod-filters h2').on('click', function(){
      $('.filters-wrap').slideToggle('slow');
      $('#vod-filters h2 span').toggleClass('up-green');
    });

    // vars
    var url = '<?php echo home_url('vod');?>';
      args = {};

    var filtersExist = $('#vod-filters .filter').find('input:checked');
    if ( filtersExist.length > 0 ) {
      console.log('filters exist!')
      var clearFilters = '<a href="#" class="clearFilters">Clear Filters X </a>';
      $('#vod-filters').before(clearFilters);
    }

    $('a.clearFilters').on('click', function(e){
      e.preventDefault();
      window.location.replace( url );
    });

    // change
    $('#vod-filters').on('change', 'input[type="checkbox"]', function(){

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

  });
</script>

</div>

<?php
