<div class="" layout="column" style="padding-bottom: 15px;">
            <div class="row" style="padding-top: 20px">
                <div class="col-lg-12">
                    <md-toolbar class="md-whiteframe-z3">
                        <div class="md-toolbar-tools">
                            <h1 class="md-flex">Dialog</h1>
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
<div layout-fill layout="column" class="inset">
   <div class="md-padding">
  <p class="inset">
    Open a dialog over the app's content. Press escape or click outside to close the dialog and
    send focus back to the triggering button.
  </p>
  <div class="dialog-demo-content" layout="row" layout-wrap>
    <md-button class="md-primary md-raised" ng-click="showAlert($event)" flex flex-md="100">
      Alert Dialog
    </md-button>
    <md-button class="md-primary md-raised" ng-click="showConfirm($event)" flex flex-md="100">
      Confirm Dialog
    </md-button>
    <md-button class="md-primary md-raised" ng-click="showAdvanced($event)" flex flex-md="100">
      Custom Dialog
    </md-button>
  </div>
  <div ng-if="alert">
    <br/>
    <b layout="row" layout-align="center center" class="md-padding">
      {{alert}}
    </b>
  </div>
</div>
</div>
     </div>
            </md-content> 

          </div>



