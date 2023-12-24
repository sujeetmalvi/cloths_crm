<!DOCTYPE html>
<html lang="en">
@include('template.head')
  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="/" class="site_title"><i class="fa fa-paw"></i> <span>Gentelella Alela!</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            @include('template.quick_info')
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            @include('template.sidebar')
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            @include('template.sidebar_footer')
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        @include('template.top_nav')
        <!-- /top navigation -->
