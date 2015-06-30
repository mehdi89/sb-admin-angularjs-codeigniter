<script>function getAuth() {
<?php echo $fx ?>;
    }</script>
<?php if ($read): ?>
    <div>
        <div class="" layout="column" style="padding-bottom: 15px;">
            <div class="row" style="padding-top: 20px">
                <div class="col-lg-12">
                    <md-toolbar class="md-whiteframe-z3">
                        <div class="md-toolbar-tools">
                            <h1 class="md-flex">Products</h1>
                        </div>
                    </md-toolbar>
                    <!--<hr>-->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <md-content class="md-whiteframe-z2" layout-padding style="padding: 20px;">

                <div class="row">
                    <div class="col-lg-12">
                        <kendo-grid options="PrpductsGridOptions">
                        </kendo-grid>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
            </md-content>    


        </div>
    </div>
<?php else: ?>
    <p> Not permitted</p>
<?php endif; ?>
