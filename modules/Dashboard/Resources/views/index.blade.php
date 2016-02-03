@extends('arxmin::layouts.admin')

@section('control-sidebar-settings-tab')
	<h1>This is a custom setting example</h1>
@stop

@section('content')
	<div id="portlet-config" class="modal hide">
		<div class="modal-header">
			<button data-dismiss="modal" class="close" type="button"></button>
			<h3></h3>
		</div>
		<div class="modal-body"></div>
	</div>
	<div class="clearfix"></div>
	<div class="content">
		<div id="container">
			<div class="row">
				<div class="col-lg-3 col-xs-6">
					<!-- small box -->
					<div class="small-box bg-aqua">
						<div class="inner">
							<h3>150</h3>
							<p>New Orders</p>
						</div>
						<div class="icon">
							<i class="ion ion-bag"></i>
						</div>
						<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
					</div>
				</div><!-- ./col -->
				<div class="col-lg-3 col-xs-6">
					<!-- small box -->
					<div class="small-box bg-green">
						<div class="inner">
							<h3>53<sup style="font-size: 20px">%</sup></h3>
							<p>Bounce Rate</p>
						</div>
						<div class="icon">
							<i class="ion ion-stats-bars"></i>
						</div>
						<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
					</div>
				</div><!-- ./col -->
				<div class="col-lg-3 col-xs-6">
					<!-- small box -->
					<div class="small-box bg-yellow">
						<div class="inner">
							<h3>44</h3>
							<p>User Registrations</p>
						</div>
						<div class="icon">
							<i class="ion ion-person-add"></i>
						</div>
						<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
					</div>
				</div><!-- ./col -->
				<div class="col-lg-3 col-xs-6">
					<!-- small box -->
					<div class="small-box bg-red">
						<div class="inner">
							<h3>65</h3>
							<p>Unique Visitors</p>
						</div>
						<div class="icon">
							<i class="ion ion-pie-graph"></i>
						</div>
						<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
					</div>
				</div><!-- ./col -->
			</div><!-- /.row -->
			<!-- Main row -->
			<div class="row">
				<!-- Left col -->
				<section class="col-lg-7 connectedSortable">

					<!-- TO DO List -->
					<div class="box box-primary">
						<div class="box-header">
							<i class="ion ion-clipboard"></i>
							<h3 class="box-title">To Do List</h3>
							<div class="box-tools pull-right">
								<ul class="pagination pagination-sm inline">
									<li><a href="#">&laquo;</a></li>
									<li><a href="#">1</a></li>
									<li><a href="#">2</a></li>
									<li><a href="#">3</a></li>
									<li><a href="#">&raquo;</a></li>
								</ul>
							</div>
						</div><!-- /.box-header -->
						<div class="box-body">
							<ul class="todo-list">
								<li>
									<!-- drag handle -->
                      <span class="handle">
                        <i class="fa fa-ellipsis-v"></i>
                        <i class="fa fa-ellipsis-v"></i>
                      </span>
									<!-- checkbox -->
									<input type="checkbox" value="" name=""/>
									<!-- todo text -->
									<span class="text">Custom your own dashboard</span>
									<!-- Emphasis label -->
									<small class="label label-danger"><i class="fa fa-clock-o"></i> 2 mins</small>
									<!-- General tools such as edit or delete-->
									<div class="tools">
										<i class="fa fa-edit"></i>
										<i class="fa fa-trash-o"></i>
									</div>
								</li>
								<li>
                      <span class="handle">
                        <i class="fa fa-ellipsis-v"></i>
                        <i class="fa fa-ellipsis-v"></i>
                      </span>
									<input type="checkbox" value="" name=""/>
									<span class="text">Make a real social innovation</span>
									<small class="label label-info"><i class="fa fa-clock-o"></i> 4 hours</small>
									<div class="tools">
										<i class="fa fa-edit"></i>
										<i class="fa fa-trash-o"></i>
									</div>
								</li>
								<li>
                      <span class="handle">
                        <i class="fa fa-ellipsis-v"></i>
                        <i class="fa fa-ellipsis-v"></i>
                      </span>
									<input type="checkbox" value="" name=""/>
									<span class="text">Let theme shine like a star</span>
									<small class="label label-warning"><i class="fa fa-clock-o"></i> 1 day</small>
									<div class="tools">
										<i class="fa fa-edit"></i>
										<i class="fa fa-trash-o"></i>
									</div>
								</li>
								<li>
                      <span class="handle">
                        <i class="fa fa-ellipsis-v"></i>
                        <i class="fa fa-ellipsis-v"></i>
                      </span>
									<input type="checkbox" value="" name=""/>
									<span class="text">Let theme shine like a star</span>
									<small class="label label-success"><i class="fa fa-clock-o"></i> 3 days</small>
									<div class="tools">
										<i class="fa fa-edit"></i>
										<i class="fa fa-trash-o"></i>
									</div>
								</li>
								<li>
                      <span class="handle">
                        <i class="fa fa-ellipsis-v"></i>
                        <i class="fa fa-ellipsis-v"></i>
                      </span>
									<input type="checkbox" value="" name=""/>
									<span class="text">Check your messages and notifications</span>
									<small class="label label-primary"><i class="fa fa-clock-o"></i> 1 week</small>
									<div class="tools">
										<i class="fa fa-edit"></i>
										<i class="fa fa-trash-o"></i>
									</div>
								</li>
								<li>
                      <span class="handle">
                        <i class="fa fa-ellipsis-v"></i>
                        <i class="fa fa-ellipsis-v"></i>
                      </span>
									<input type="checkbox" value="" name=""/>
									<span class="text">Let theme shine like a star</span>
									<small class="label label-default"><i class="fa fa-clock-o"></i> 1 month</small>
									<div class="tools">
										<i class="fa fa-edit"></i>
										<i class="fa fa-trash-o"></i>
									</div>
								</li>
							</ul>
						</div><!-- /.box-body -->
						<div class="box-footer clearfix no-border">
							<button class="btn btn-default pull-right"><i class="fa fa-plus"></i> Add item</button>
						</div>
					</div><!-- /.box -->

					<!-- quick email widget -->
					<div class="box box-info">
						<div class="box-header">
							<i class="fa fa-envelope"></i>
							<h3 class="box-title">Quick Email</h3>
							<!-- tools box -->
							<div class="pull-right box-tools">
								<button class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
							</div><!-- /. tools -->
						</div>
						<div class="box-body">
							<form action="#" method="post">
								<div class="form-group">
									<input type="email" class="form-control" name="emailto" placeholder="Email to:"/>
								</div>
								<div class="form-group">
									<input type="text" class="form-control" name="subject" placeholder="Subject"/>
								</div>
								<div>
									<textarea class="textarea" placeholder="Message" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
								</div>
							</form>
						</div>
						<div class="box-footer clearfix">
							<button class="pull-right btn btn-default" id="sendEmail">Send <i class="fa fa-arrow-circle-right"></i></button>
						</div>
					</div>

				</section><!-- /.Left col -->
				<!-- right col (We are only adding the ID to make the widgets sortable)-->
				<section class="col-lg-5 connectedSortable">

					<!-- Calendar -->
					<div class="box box-solid bg-green-gradient">
						<div class="box-header">
							<i class="fa fa-calendar"></i>
							<h3 class="box-title">Calendar</h3>
							<!-- tools box -->
							<div class="pull-right box-tools">
								<!-- button with a dropdown -->
								<div class="btn-group">
									<button class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i></button>
									<ul class="dropdown-menu pull-right" role="menu">
										<li><a href="#">Add new event</a></li>
										<li><a href="#">Clear events</a></li>
										<li class="divider"></li>
										<li><a href="#">View calendar</a></li>
									</ul>
								</div>
								<button class="btn btn-success btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
								<button class="btn btn-success btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
							</div><!-- /. tools -->
						</div><!-- /.box-header -->
						<div class="box-body no-padding">
							<!--The calendar -->
							<div id="calendar" style="width: 100%"></div>
						</div><!-- /.box-body -->
						<div class="box-footer text-black">
							<div class="row">
								<div class="col-sm-6">
									<!-- Progress bars -->
									<div class="clearfix">
										<span class="pull-left">Task #1</span>
										<small class="pull-right">90%</small>
									</div>
									<div class="progress xs">
										<div class="progress-bar progress-bar-green" style="width: 90%;"></div>
									</div>

									<div class="clearfix">
										<span class="pull-left">Task #2</span>
										<small class="pull-right">70%</small>
									</div>
									<div class="progress xs">
										<div class="progress-bar progress-bar-green" style="width: 70%;"></div>
									</div>
								</div><!-- /.col -->
								<div class="col-sm-6">
									<div class="clearfix">
										<span class="pull-left">Task #3</span>
										<small class="pull-right">60%</small>
									</div>
									<div class="progress xs">
										<div class="progress-bar progress-bar-green" style="width: 60%;"></div>
									</div>

									<div class="clearfix">
										<span class="pull-left">Task #4</span>
										<small class="pull-right">40%</small>
									</div>
									<div class="progress xs">
										<div class="progress-bar progress-bar-green" style="width: 40%;"></div>
									</div>
								</div><!-- /.col -->
							</div><!-- /.row -->
						</div>
					</div><!-- /.box -->

				</section><!-- right col -->
			</div><!-- /.row (main row) -->
		</div>
		<!-- END PAGE -->
@stop