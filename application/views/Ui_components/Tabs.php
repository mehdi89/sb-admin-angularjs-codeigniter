
<div class="" layout="column" style="padding-bottom: 15px;">
            <div class="row" style="padding-top: 20px">
                <div class="col-lg-12">
                    <md-toolbar class="md-whiteframe-z3">
                        <div class="md-toolbar-tools">
                            <h1 class="md-flex">Dynamic Tabs</h1>
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
<div class="sample" layout="column">
  <md-content class="md-padding">
    <md-tabs md-selected="selectedIndex" md-border-bottom md-autoselect>
      <md-tab ng-repeat="tab in tabs"
              ng-disabled="tab.disabled"
              label="{{tab.title}}">
        <div class="demo-tab tab{{$index%4}}" style="padding: 25px; text-align: center;">
          <div ng-bind="tab.content"></div>
          <br/>
          <md-button class="md-primary md-raised" ng-click="removeTab( tab )" ng-disabled="tabs.length <= 1">Remove Tab</md-button>
        </div>
      </md-tab>
    </md-tabs>
  </md-content>
  <form ng-submit="addTab(tTitle,tContent)" layout="column" class="md-padding" style="padding-top: 0;">
    <div layout="row" layout-sm="column">
      <div flex style="position: relative;">
        <h2 class="md-subhead" style="position: absolute; bottom: 0; left: 0; margin: 0; font-weight: 500; text-transform: uppercase; line-height: 35px; white-space: nowrap;">Add a new Tab:</h2>
      </div>
      <div>
        <label for="label">Label</label>
        <input type="text" id="label" ng-model="tTitle">
      </div>
      <div>
        <label for="content">Content</label>
        <input type="text" id="content" ng-model="tContent">
      </div>
      <md-button class="add-tab md-primary md-raised" ng-disabled="!tTitle || !tContent" type="submit" style="margin-right: 0;">Add Tab</md-button>
    </div>
  </form>
</div>
</div>
                    <!-- /.col-lg-12 -->
                </div>
            </md-content> 

          </div>

<style type="text/css">
  

.tabsdemoDynamicTabs md-content {
  background-color: transparent !important; }
  .tabsdemoDynamicTabs md-content md-tabs {
    border: 1px solid #e1e1e1; }
    .tabsdemoDynamicTabs md-content md-tabs md-tab-content {
      background: #f6f6f6; }
    .tabsdemoDynamicTabs md-content md-tabs md-tabs-canvas {
      background: white; }
  .tabsdemoDynamicTabs md-content h1:first-child {
    margin-top: 0; }
.tabsdemoDynamicTabs md-input-container {
  padding-bottom: 0; }
.tabsdemoDynamicTabs .remove-tab {
  margin-bottom: 40px; }
.tabsdemoDynamicTabs .demo-tab > div > div {
  padding: 25px;
  box-sizing: border-box; }
.tabsdemoDynamicTabs .edit-form input {
  width: 100%; }
.tabsdemoDynamicTabs md-tabs {
  border-bottom: 1px solid rgba(0, 0, 0, 0.12); }
.tabsdemoDynamicTabs md-tab[disabled] {
  opacity: 0.5; }
.tabsdemoDynamicTabs label {
  text-align: left; }
.tabsdemoDynamicTabs .long > input {
  width: 264px; }
.tabsdemoDynamicTabs .md-button.add-tab {
  transform: translateY(5px); }


</style>