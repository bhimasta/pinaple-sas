    <div class="pageheader">
      <h2><i class="fa fa-group"></i> Manage Classes </h2>
      <div class="breadcrumb-wrapper">
        <span class="label">You are here:</span>
        <ol class="breadcrumb">
          <li><a href="<?php echo base_url();?>dashboard">Pinaple SAS</a></li>
          <li><a href="<?php echo base_url();?>initiation/class_open">Manage Class</a></li>
          <li><a href="<?php echo base_url();?>initiation/class_open/class_list">Class List</a></li>
          <li class="active">Menu <?php echo $unit->name ?> </li>
        </ol>
      </div>
    </div>
        
    <div class="contentpanel">
      
      <?php if ($message != null ) : ?>
      <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <strong>Well done!</strong>   <?php echo $message; ?>
        </div>
      <?php endif ; ?>

      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Manage Class on Unit <?php echo $unit->name ?></h3>
          <p>
	            <a class="btn btn-danger" href="<?php echo base_url(); ?>initiation/class_open/add/<?php echo $unit->id; ?>" data-title="Add Data" class="tip">Add Class</a>
          </p>
        </div>
        <div class="panel-body">
          <div class="table-responsive">
            <table class="table">
              <thead>
                <th style="width:10%;">Stage</th>
                <th style="width:30%;">Class Name</th>
                <th style="width:25%;">Homeroom Teacher 1</th>
                <th style="width:25%;">Homeroom Teacher 2</th>
                <th style="width:10%;"></th>
              </thead>
              <tbody>
                <?php if (count($classes) > 0) : ?>
                  <?php $no = 1; foreach ($classes as $class): ?>
                      <tr>
                          <td><?php echo $class->level; ?></td>
                          <td><?php echo $class->name; ?></td>
                          <td><?php echo $class->homeroom_1_name; ?></td>
                          <td><?php echo $class->homeroom_2_name; ?></td>
                          <td>
                             <a href="<?php echo base_url(); ?>initiation/class_open/edit/<?php echo $unit->id; ?>/<?php echo $class->id; ?>">
                              <i class="fa fa-pencil"></i></a>
                              &nbsp;&nbsp;
                             <a href="<?php echo base_url(); ?>initiation/class_open/delete/<?php echo $unit->id; ?>/<?php echo $class->id; ?>">
                              <i class="fa fa-trash-o"></i></a>                                            
                          </td>
                      </tr>
                  <?php $no++; endforeach ; ?>
                <?php else : ?>
                      <tr>
                        <td colspan='6'>No Open Class yet!</td>
                      </tr>
                <?php endif; ?>
              </tbody>
           </table>
          </div><!-- table-responsive -->
          <div class="clearfix mb30"></div>
        </div><!-- panel-body -->
      </div><!-- panel -->
        
    </div><!-- contentpanel -->
    
<script src="<?php echo base_url();?>bracket/js/jquery-1.10.2.min.js"></script>
<script src="<?php echo base_url();?>bracket/js/jquery-migrate-1.2.1.min.js"></script>
<script src="<?php echo base_url();?>bracket/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>bracket/js/modernizr.min.js"></script>
<script src="<?php echo base_url();?>bracket/js/jquery.sparkline.min.js"></script>
<script src="<?php echo base_url();?>bracket/js/toggles.min.js"></script>
<script src="<?php echo base_url();?>bracket/js/retina.min.js"></script>
<script src="<?php echo base_url();?>bracket/js/jquery.cookies.js"></script>

<script src="<?php echo base_url()?>bracket/js/jquery.datatables.min.js"></script>
<script src="<?php echo base_url()?>bracket/js/chosen.jquery.min.js"></script>

<script src="<?php echo base_url();?>bracket/js/custom.js"></script>
<script>
  jQuery(document).ready(function() {
    
    jQuery('#table1').dataTable();
    
    // Chosen Select
    jQuery("select").chosen({
      'min-width': '100px',
      'white-space': 'nowrap',
      disable_search_threshold: 10
    });
    
  
  });
</script>
