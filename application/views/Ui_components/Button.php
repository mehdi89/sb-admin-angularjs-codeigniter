<div class="" layout="column" style="padding-bottom: 15px;">
            <div class="row" style="padding-top: 20px">
                <div class="col-lg-12">
                    <md-toolbar class="md-whiteframe-z3">
                        <div class="md-toolbar-tools">
                            <h1 class="md-flex">Material Button</h1>
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
   <md-content>
    <section layout="row" layout-sm="column" layout-align="center center">
      <md-button>{{title1}}</md-button>
      <md-button md-no-ink class="md-primary">Primary (md-noink)</md-button>
      <md-button ng-disabled="true" class="md-primary">Disabled</md-button>
      <md-button class="md-warn">{{title4}}</md-button>
      <div class="label">Flat</div>
    </section>
    <section layout="row" layout-sm="column" layout-align="center center">
      <md-button class="md-raised">Button</md-button>
      <md-button class="md-raised md-primary">Primary</md-button>
      <md-button ng-disabled="true" class="md-raised md-primary">Disabled</md-button>
      <md-button class="md-raised md-warn">Warn</md-button>
      <div class="label">Raised</div>
    </section>
    <section layout="row" layout-sm="column" layout-align="center center">
        <md-button class="md-fab" aria-label="Eat cake">
            <md-icon md-svg-src="app/img/icons/cake.svg"></md-icon>
        </md-button>
        <md-button class="md-fab md-primary" aria-label="Use Android">
          <md-icon md-svg-src="app/img/icons/android.svg"></md-icon>
        </md-button>
        <md-button class="md-fab" ng-disabled="true" aria-label="Comment">
            <md-icon md-svg-src="app/img/icons/ic_comment_24px.svg"></md-icon>
        </md-button>
        <md-button class="md-fab md-primary md-hue-2" aria-label="Profile">
            <md-icon md-svg-src="app/img/icons/ic_people_24px.svg"></md-icon>
        </md-button>
        <md-button class="md-fab md-mini" aria-label="Eat cake">
            <md-icon md-svg-src="app/img/icons/cake.svg"></md-icon>
        </md-button>
        <md-button class="md-fab md-mini md-primary" aria-label="Use Android">
          <md-icon md-svg-src="app/img/icons/android.svg" style="color: greenyellow;"></md-icon>
        </md-button>
      <div class="label">FAB</div>
    </section>
    <section layout="row" layout-sm="column" layout-align="center center">
        <md-button ng-href="{{googleUrl}}" target="_blank">Default Link</md-button>
        <md-button class="md-primary" ng-href="{{googleUrl}}" target="_blank">Primary Link</md-button>
        <md-button>Default Button</md-button>
      <div class="label">Link vs. Button</div>
    </section>
    <section layout="row" layout-sm="column" layout-align="center center">
      <md-button class="md-primary md-hue-1">Primary Hue 1</md-button>
      <md-button class="md-warn md-raised md-hue-2">Warn Hue 2</md-button>
      <md-button class="md-accent">Accent</md-button>
      <md-button class="md-accent md-raised md-hue-1">Accent Hue 1</md-button>
      <div class="label">Themed</div>
    </section>
    <section layout="row" layout-sm="column" layout-align="center center">
      <md-button class="md-icon-button md-primary" aria-label="Settings">
        <md-icon md-svg-icon="app/img/icons/menu.svg"></md-icon>
      </md-button>
      <md-button class="md-icon-button md-accent" aria-label="Favorite">
        <md-icon md-svg-icon="app/img/icons/favorite.svg"></md-icon>
      </md-button>
      <md-button class="md-icon-button" aria-label="More">
        <md-icon md-svg-icon="app/img/icons/more_vert.svg"></md-icon>
      </md-button>
      <md-button href="http://google.com"
                 title="Launch Google.com in new window"
                 target="_blank"
                 ng-disabled="true"
                 aria-label="Google.com"
                 class="md-icon-button launch" >
        <md-icon md-svg-icon="app/img/icons/launch.svg"></md-icon>
      </md-button>
      <div class="label">Icon Button</div>
    </section>
  </md-content>
</div>
     </div>
            </md-content> 

          </div>
