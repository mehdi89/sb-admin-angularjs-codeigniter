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
            <div class="col-lg-8 col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Bar Chart</div>
                    <div class="panel-body">
                        <canvas id="bar" class="chart chart-bar" data="bar.data" labels="bar.labels" series="bar.series"
                                options="bar.options"></canvas>
                    </div>
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-8 -->
            <div class="col-lg-4 col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Pie Chart</div>
                    <div class="panel-body">
                        <canvas id="pie" class="chart chart-pie chart-xs" data="pie.data" labels="pie.labels"></canvas>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">Doughnut Chart</div>
                        <div class="panel-body">
                            <canvas id="doughnut" class="chart chart-doughnut chart-xs" data="donut.data" labels="donut.labels" legend="false"></canvas>
                        </div>
                    </div>
                </div>
                <!-- /.panel -->

            <!-- <chat></chat> -->
                <!-- /.panel .chat-panel -->
            </div>
            <!-- /.col-lg-4 -->
        </div>
        <!-- /.row -->
       
    </md-content>
</div>
