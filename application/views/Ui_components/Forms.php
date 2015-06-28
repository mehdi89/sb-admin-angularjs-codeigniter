<div class="" layout="column" style="padding-bottom: 15px;">
            <div class="row" style="padding-top: 20px">
                <div class="col-lg-12">
                    <md-toolbar class="md-whiteframe-z3">
                        <div class="md-toolbar-tools">
                            <h1 class="md-flex">Checkbox</h1>
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
                       <fieldset class="standard">
    <legend>Using <code>ng-model</code></legend>
    <div layout="row" layout-wrap>
      <div flex="50">
        <md-checkbox ng-model="data.cb1" aria-label="Checkbox 1">
          Checkbox 1: {{ data.cb1 }}
        </md-checkbox>
      </div>
      <div flex="50">
        <md-checkbox
            ng-model="data.cb2"
            aria-label="Checkbox 2"
            ng-true-value="'yup'"
            ng-false-value="'nope'"
            class="md-warn">
          Checkbox 2 (md-warn): {{ data.cb2 }}
        </md-checkbox>
      </div>
      <div flex="50">
        <md-checkbox ng-disabled="true" aria-label="Disabled checkbox" ng-model="data.cb3">
          Checkbox: Disabled
        </md-checkbox>
      </div>
      <div flex="50">
        <md-checkbox ng-disabled="true" aria-label="Disabled checked checkbox" ng-model="data.cb4" ng-init="data.cb4=true">
          Checkbox: Disabled, Checked
        </md-checkbox>
      </div>
      <div flex="50">
        <md-checkbox md-no-ink aria-label="Checkbox No Ink" ng-model="data.cb5" class="md-primary">
          Checkbox (md-primary): No Ink
        </md-checkbox>
      </div>
    </div>
  </fieldset>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
            </md-content>
            <div class="row" style="padding-top: 20px">
                <div class="col-lg-12">
                    <md-toolbar class="md-whiteframe-z3">
                        <div class="md-toolbar-tools">
                            <h1 class="md-flex">List Control</h1>
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
                     <md-subheader class="md-no-sticky">Single Action Checkboxes</md-subheader>
  <md-list-item ng-repeat="topping in toppings">
    <p> {{ topping.name }} </p>
    <md-checkbox class="md-secondary" ng-model="topping.wanted"></md-checkbox>
  </md-list-item>
  <md-divider></md-divider>
  <md-subheader class="md-no-sticky">Clickable Items with Secondary Controls</md-subheader>
  <md-list-item ng-click="navigateTo(setting.extraScreen, $event)" ng-repeat="setting in settings">
    <md-icon md-svg-icon="{{setting.icon}}"></md-icon>
    <p> {{ setting.name }} </p>
    <md-switch class="md-secondary" ng-model="setting.enabled"></md-switch>
  </md-list-item>
  <md-list-item ng-click="navigateTo('data usage', $event)">
    <md-icon md-svg-icon="cached"></md-icon>
    <p>Data Usage</p>
  </md-list-item>
  <md-divider></md-divider>
  <md-subheader class="md-no-sticky">Checkbox with Secondary Action</md-subheader>
  <md-list-item ng-repeat="message in messages">
    <md-checkbox ng-model="message.selected"></md-checkbox>
    <p>{{message.title}}</p>
    <md-icon class="md-secondary" ng-click="doSecondaryAction($event)" aria-label="Chat" md-svg-icon="communication:message"></md-icon>
  </md-list-item>
  <md-divider></md-divider>
  <md-subheader class="md-no-sticky">Avatar with Secondary Action Icon</md-subheader>
  <md-list-item ng-repeat="person in people" ng-click="goToPerson(person.name, $event)">
    <img alt="{{ person.name }}" ng-src="{{ person.img }}" class="md-avatar" />
    <p>{{ person.name }}</p>
    <md-icon md-svg-icon="communication:messenger" ng-click="doSecondaryAction($event)" aria-label="Open Chat" class="md-secondary md-hue-3" ng-class="{'md-primary': person.newMessage}"></md-icon>
  </md-list-item>
 </div>
                    <!-- /.col-lg-12 -->
                </div>
            </md-content>     
            <div class="row" style="padding-top: 20px">
                <div class="col-lg-12">
                    <md-toolbar class="md-whiteframe-z3">
                        <div class="md-toolbar-tools">
                            <h1 class="md-flex">Select</h1>
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


<div layout="column" layout-align="center center" style="padding:40px">
  <p>Select can call an arbitrary function on show. If this function returns a promise, it will display a loading indicator while it is being resolved:</p>
  <div layout="column" layout-align="center center" style="height: 100px;">
    <md-select ng-model="user" md-on-open="loadUsers()" style="min-width: 200px;">
      <md-select-label>{{ user ? user.name : 'Assign to user' }}</md-select-label>
      <md-option ng-value="user" ng-repeat="user in users">{{user.name}}</md-option>
    </md-select>
    <p class="md-caption">You have assigned the task to: {{ user ? user.name : 'No one yet' }}</p>
  </div>
</div>


 </div>
                    <!-- /.col-lg-12 -->
                </div>
            </md-content> 

        </div>
