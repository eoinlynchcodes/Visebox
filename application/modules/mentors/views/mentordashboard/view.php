<div class="breadcrumb">Home <span class="breadcrumb-devider">/</span> Dashboard</div>
<div class="top-banner">
  <div class="top-banner-title">Mentor Dashboard</div>
  <div class="top-banner-subtitle">Welcome back </div>
</div>
<div class="content no-top-banner">
  <div class="content-header no-mg-top">
    <i class="fa fa-newspaper-o"></i>
    <div class="content-header-title">Welcome :  <?php $mentor_detail=get_mentor_detail(); echo $mentor_detail->first_name.' '.$mentor_detail->last_name;?></div>
    
  </div>
  <div class="panel">
    <div class="row">
      
      
          <div class="col-md-3 card-wrapper">
        <div class="card">
          <i class="fa fa-calendar"></i>
          <div class="clear">
            <div class="card-title">
              <span class="timer" data-from="0" data-to="<?php echo date('d') ?>"><?php echo date('d') ?> </span><?php echo date('M') ?>
            </div>
            <div class="card-subtitle">Date </div>
          </div>
        </div>
      </div>
    <div class="col-md-3 card-wrapper">
        <div class="card">
          <i class="fa fa-clock-o"></i>
          <div class="clear">
            <div class="card-title">

              <span class="timer" data-from="0" data-to="<?php echo date('H') ?>"><?php echo date('H') ?></span>:
              <span class="timer" data-from="0" data-to="<?php echo date('i') ?>"><?php echo date('i') ?></span>
            </div>
            <div class="card-subtitle">Time</div>
          </div>
        </div>
      </div>
    </div>
  </div>
    <div class="panel">
    <div class="row">
   <!--   <div class="col-md-4">
        <div class="content-header">
          <i class="fa fa-newspaper-o"></i>
          <div class="content-header-title">Donut Chart</div>
        </div>
        <div class="content-box">
          <div class="donut-chart-wrapper">
            <canvas width="120" height="120" id="donut-chart"></canvas>
            <div class="donut-chart-label">
              <div class="donut-chart-value">330</div>
              <div class="donut-chart-title">Total Visitor</div>
            </div>
          </div>
          <div class="donut-chart-legend">
            <div class="legend-list">
              <div class="legend-bullet green"></div>
              <div class="legend-title">Australia</div>
            </div>
            <div class="legend-list">
              <div class="legend-bullet red"></div>
              <div class="legend-title">Nigeria</div>
            </div>
            <div class="legend-list">
              <div class="legend-bullet yellow"></div>
              <div class="legend-title">United States</div>
            </div>
            <div class="legend-list">
              <div class="legend-bullet blue"></div>
              <div class="legend-title">Japan</div>
            </div>
          </div>
        </div>
      </div>-->
    <!--   <div class="col-md-12">
        <div class="content-header">
          <i class="fa fa-newspaper-o"></i>
          <div class="content-header-title">Upcoming List</div>
        </div>
        <div class="content-box">
          <div class="table-responsive">
            <div class="col-md-12">
        <div class="content-box">
          <div class="table-responsive">

</div>
</div>
          </div>
        </div>
      </div>
  <div class="panel">
    <div class="row">
      <div class="col-md-12">
        <div class="content-header">
          <i class="fa fa-signal"></i>
          <div class="content-header-title">Line Chart</div>
        </div>
        <div class="content-box">
          <div class="content-box-header">
            <div class="header-menu active">Visitors</div>
           
          </div>
          <div class="line-chart-wrapper">
            <div class="line-chart-label">LAST VISITORS</div>
            <div class="line-chart-value">
              <span class="timer" data-from="0" data-to="12501">12,501</span>
            </div>
            <canvas id="line-chart"></canvas>
          </div>
        </div>
      </div>
    <div class="col-md-4">
        <div class="content-header">
          <i class="fa fa-suitcase"></i>
          <div class="content-header-title">Line Chart</div>
         
        </div>
       
      </div> 
    </div>
  </div>

    </div> -->
  </div>
</div>
</div>
</div>