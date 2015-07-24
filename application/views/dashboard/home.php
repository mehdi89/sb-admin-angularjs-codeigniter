<div class="" layout="column" style="padding-bottom: 15px;">
    <div class="row" style="padding-top: 20px">
        <div class="col-lg-12">
            <md-toolbar class="md-whiteframe-z3">
                <div class="md-toolbar-tools">
                    <h1 class="md-flex">Dashboard</h1>
                </div>
            </md-toolbar>
            <!--<hr>-->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->

    <md-content class="md-whiteframe-z2" layout-padding style="padding: 20px;">
        <div class="row">
            <stats number="6" comments="New comments!" colour="primary" type="comments"></stats>
            <stats number="12" comments="New tasks!" colour="primary" type="user"></stats>
            <stats number="18" comments="New orders!" colour="yellow" type="shopping-cart"></stats>
            <stats number="24" comments="Support tickets!" colour="red" type="support"></stats>
        </div>

        <!-- /.panel -->
    <div class="row">
        <div class="col-lg-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-clock-o fa-fw"></i> Responsive Timeline
                </div>
                <!-- /.panel-heading -->
                <timeline></timeline>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-8 -->
        <div class="col-lg-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-bell fa-fw"></i> Notifications Panel
                </div>
                <!-- /.panel-heading -->
                <notifications></notifications> 
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->

            <chat></chat>
             <!-- /.panel .chat-panel -->
        </div>
        <!-- /.col-lg-4 -->
    </div>
    <!-- /.row -->
       
    </md-content>
</div>
