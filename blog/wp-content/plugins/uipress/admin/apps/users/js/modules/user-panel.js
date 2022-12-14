var uipMediaUploader;
export function moduleData() {
  return {
    props: {
      userID: [Number, String],
      translations: Object,
      refreshTable: Function,
      closePanel: Function,
      sendmessage: Function,
      groups: Object,
    },
    data: function () {
      return {
        panelData: [],
        userFetched: false,
        recentActivity: {
          page: 1,
          totalPages: 0,
        },
        user: {
          editData: [],
        },
        ui: {
          editing: false,
          activityOpen: true,
          pageViewsOpen: true,
          userNotesOpen: true,
        },
      };
    },
    mounted: function () {
      this.getUserData();
    },
    computed: {},
    methods: {
      getUserData() {
        let self = this;

        jQuery.ajax({
          url: uip_user_app_ajax.ajax_url,
          type: "post",
          data: {
            action: "uip_get_user_data",
            security: uip_user_app_ajax.security,
            userID: self.userID,
            activityPage: self.recentActivity.page,
          },
          success: function (response) {
            let data = JSON.parse(response);

            if (data.error) {
              ///SOMETHING WENT WRONG
              uipNotification(data.error, { pos: "bottom-left", status: "danger" });
              return;
            }
            self.panelData = data;
            self.userFetched = true;
            self.recentActivity.totalPages = self.panelData.history.totalPages;
            self.user.editData = JSON.parse(JSON.stringify(self.panelData.user));
          },
        });
      },
      updateUser() {
        let self = this;
        jQuery.ajax({
          url: uip_user_app_ajax.ajax_url,
          type: "post",
          data: {
            action: "uip_update_user",
            security: uip_user_app_ajax.security,
            user: self.user.editData,
          },
          success: function (response) {
            let data = JSON.parse(response);

            if (data.error) {
              ///SOMETHING WENT WRONG
              uipNotification(data.error, { pos: "bottom-left", status: "danger" });
              return;
            }
            uipNotification(data.message, { pos: "bottom-left", status: "danger" });
            self.ui.editing = false;
            self.panelData.user = self.user.editData;
            self.refreshTable();
          },
        });
      },
      sendPasswordReset() {
        let self = this;
        jQuery.ajax({
          url: uip_user_app_ajax.ajax_url,
          type: "post",
          data: {
            action: "uip_reset_password",
            security: uip_user_app_ajax.security,
            user: self.panelData.user,
          },
          success: function (response) {
            let data = JSON.parse(response);

            if (data.error) {
              ///SOMETHING WENT WRONG
              uipNotification(data.error, { pos: "bottom-left", status: "danger" });
              return;
            }
            uipNotification(data.message, { pos: "bottom-left", status: "danger" });
          },
        });
      },
      deleteUser() {
        let self = this;
        if (!confirm(self.translations.confirmUserDelete)) {
          return;
        }

        jQuery.ajax({
          url: uip_user_app_ajax.ajax_url,
          type: "post",
          data: {
            action: "uip_delete_user",
            security: uip_user_app_ajax.security,
            userID: self.panelData.user.user_id,
          },
          success: function (response) {
            let data = JSON.parse(response);

            if (data.error) {
              ///SOMETHING WENT WRONG
              uipNotification(data.error, { pos: "bottom-left", status: "danger" });
              return;
            }
            uipNotification(data.message, { pos: "bottom-left", status: "danger" });
            self.refreshTable();
            self.closePanel();
          },
        });
      },
      logoutEverywhere() {
        let self = this;
        jQuery.ajax({
          url: uip_user_app_ajax.ajax_url,
          type: "post",
          data: {
            action: "uip_logout_user_everywhere",
            security: uip_user_app_ajax.security,
            userID: self.panelData.user.user_id,
          },
          success: function (response) {
            let data = JSON.parse(response);

            if (data.error) {
              ///SOMETHING WENT WRONG
              uipNotification(data.error, { pos: "bottom-left", status: "danger" });
              return;
            }
            uipNotification(data.message, { pos: "bottom-left", status: "danger" });
          },
        });
      },
      changePage(direction) {
        if (direction == "next") {
          this.recentActivity.page += 1;
        }
        if (direction == "previous") {
          this.recentActivity.page = this.recentActivity.page - 1;
        }
        this.getUserData();
      },
      returnViewTitle(view) {
        if (view.title) {
          return view.title;
        } else {
          return view.url;
        }
      },
      returnRoles(roles) {
        this.user.editData.roles = roles;
      },
      returnGroups(groups) {
        this.user.editData.uip_user_group = groups;
      },
      sendUserMessage() {
        let self = this;
        self.closePanel();
        self.sendmessage(self.user.editData);
      },
      chooseImage() {
        self = this;
        uipMediaUploader = wp.media.frames.file_frame = wp.media({
          title: self.translations.chooseImage,
          button: {
            text: self.translations.chooseImage,
          },
          multiple: false,
        });
        uipMediaUploader.on("select", function () {
          var attachment = uipMediaUploader.state().get("selection").first().toJSON();
          self.user.editData.uip_profile_image = attachment.url;
        });
        uipMediaUploader.open();
      },
    },
    template:
      '<div class="" v-if="userFetched">\
        <!-- EDITING USER -->\
        <div class="" v-if="ui.editing">\
          <div class="uip-text-bold uip-text-xl uip-margin-bottom-m">{{translations.editUser}}</div>\
          <div class="uip-flex uip-flex-column uip-row-gap-m">\
            <div class="uip-w-50p">\
              <div class="uip-margin-bottom-xs">{{translations.profileImage}}</div>\
              <div class="uip-flex uip-gap-s uip-flex-start">\
                <div v-if="!user.editData.uip_profile_image" class="uip-flex uip-flex-center uip-flex-middle uip-background-default uip-border uip-padding-s uip-border-circle uip-w-50 uip-h-50 uip-margin-bottom-xs uip-cursor-pointer" @click="chooseImage()">\
                  <span class="uip-text-muted uip-text-center">{{translations.chooseImage}}</span>\
                </div>\
                <img v-if="user.editData.uip_profile_image" class="uip-h-50 uip-max-h-50 uip-w-50 uip-border-circle uip-border uip-margin-bottom-xs uip-cursor-pointer" :src="user.editData.uip_profile_image"  @click="chooseImage()">\
                <div class="uip-flex">\
                  <input class="uip-flex-grow uip-margin-right-xs uip-standard-input" type="text" placeholder="URL..." v-model="user.editData.uip_profile_image">\
                  <span class="uip-background-muted material-icons-outlined uip-padding-xxs uip-border-round hover:uip-background-grey uip-cursor-pointer uip-text-normal"\
                  @click="user.editData.uip_profile_image = \'\'">delete</span>\
                </div>\
              </div>\
            </div>\
            <div class="uip-flex uip-gap-s">\
              <div class="uip-w-50p">\
                <div class="uip-margin-bottom-xs">{{translations.firstName}}</div>\
                <input type="text" class="uip-w-100p" v-model="user.editData.first_name">\
              </div>\
              <div class="uip-w-50p">\
                <div class="uip-margin-bottom-xs">{{translations.lastName}}</div>\
                <input type="text" class="uip-w-100p"  v-model="user.editData.last_name">\
              </div>\
            </div>\
            <div>\
              <div class="uip-margin-bottom-xs">{{translations.email}}</div>\
              <input type="text" class="uip-w-100p"  v-model="user.editData.user_email">\
            </div>\
            <div class="uip-flex uip-gap-s">\
              <div class="uip-w-50p">\
                <div class="uip-margin-bottom-xs">{{translations.roles}}</div>\
                <role-select :selected="user.editData.roles"\
                :name="translations.assignRoles"\
                :translations="translations"\
                :single=\'false\'\
                :placeholder="translations.searchRoles"\
                :updateRoles="returnRoles"></role-select>\
              </div>\
              <div class="uip-w-50p">\
                <div class="uip-margin-bottom-xs">{{translations.groups}}</div>\
                <group-select :groups="groups" :selected="user.editData.uip_user_group"\
                :name="translations.assignGroups"\
                :single=\'false\'\
                :placeholder="translations.searchGroups"\
                :updategroups="returnGroups"></group-select>\
              </div>\
            </div>\
            <div>\
              <div class="uip-margin-bottom-xs">{{translations.userNotes}}</div>\
              <textarea type="text" class="uip-w-100p" rows="10" v-model="user.editData.notes"></textarea>\
            </div>\
            <div class="uip-flex uip-flex-between uip-margin-top-m">\
              <button class="uip-button-default" @click="ui.editing = false">{{translations.cancel}}</button>\
              <button class="uip-button-primary" @click="updateUser()">{{translations.updateUser}}</button>\
            </div>\
          </div>\
        </div>\
        <!-- OVERVIEW -->\
        <div class="" v-if="!ui.editing">\
          <div class="uip-flex uip-flex-center uip-gap-s uip-margin-bottom-m">\
            <div class="">\
              <img :src="panelData.user.image" class="uip-border-circle uip-h-50 uip-w-50">\
            </div>\
            <div class="uip-flex uip-flex-column uip-row-gap-xs">\
              <div class="uip-text-bold uip-text-xl">{{panelData.user.username}}</div>\
              <div class="uip-flex uip-gap-xs">\
                <div v-for="role in panelData.user.roles" class="uip-background-primary-wash uip-border-round uip-padding-left-xxs uip-padding-right-xxs uip-text-bold uip-text-s">\
                  {{role}}\
                </div>\
              </div>\
            </div>\
          </div>\
          <div class="uip-flex uip-flex-center uip-margin-bottom-s uip-background-muted uip-border-rounded uip-padding-xs uip-border-round uip-flex-between">\
            <div class="uip-text-m uip-text-bold uip-flex-grow">{{translations.details}}</div>\
            <div>\
              <dropdown type="icon" icon="more_horiz" pos="bottom-right" buttonsize="small" \
              :tooltip="true" :tooltiptext="translations.userOptions" :width="200">\
                <div class="uip-padding-xs uip-flex uip-flex-column uip-row-gap-xxs uip-w-200">\
                  <div class="uip-flex uip-gap-xs uip-border-round uip-cursor-pointer hover:uip-background-muted uip-padding-xxs" @click="ui.editing = true">\
                    <div class="material-icons-outlined">edit</div>\
                    <div>{{translations.editUser}}</div>\
                  </div>\
                  <div class="uip-flex uip-gap-xs uip-border-round uip-cursor-pointer hover:uip-background-muted uip-padding-xxs" @click="sendPasswordReset()">\
                    <div class="material-icons-outlined">lock</div>\
                    <div>{{translations.sendPasswordReset}}</div>\
                  </div>\
                  <div class="uip-flex uip-gap-xs uip-border-round uip-cursor-pointer hover:uip-background-muted uip-padding-xxs" @click="sendUserMessage()">\
                    <div class="material-icons-outlined">mail</div>\
                    <div>{{translations.sendMessage}}</div>\
                  </div>\
                  <div class="uip-flex uip-gap-xs uip-border-round uip-cursor-pointer hover:uip-background-muted uip-padding-xxs" @click="logoutEverywhere()">\
                    <div class="material-icons-outlined">logout</div>\
                    <div>{{translations.logoutEverywhere}}</div>\
                  </div>\
                  <div class="uip-flex uip-gap-xs uip-border-round uip-cursor-pointer hover:uip-background-muted uip-padding-xxs" @click="deleteUser()">\
                    <div class="material-icons-outlined">delete</div>\
                    <div>{{translations.deleteUser}}</div>\
                  </div>\
                </div>\
              </dropdown>\
            </div>\
          </div>\
          <div class="uip-padding-s uip-flex uip-flex-column uip-row-gap-xs uip-margin-bottom-s">\
            <div class="uip-flex uip-gap-xs">\
              <div class="material-icons-outlined">badge</div>\
              <div class="uip-flex-grow">{{translations.name}}</div>\
              <div class="">{{panelData.user.name}}</div>\
            </div>\
            <div class="uip-flex uip-gap-xs">\
              <div class="material-icons-outlined">mail</div>\
              <div class="uip-flex-grow">{{translations.email}}</div>\
              <div class="">{{panelData.user.user_email}}</div>\
            </div>\
            <div class="uip-flex uip-gap-xs">\
              <div class="material-icons-outlined">add_circle</div>\
              <div class="uip-flex-grow">{{translations.accountCreated}}</div>\
              <div class="">{{panelData.user.user_registered}}</div>\
            </div>\
            <div class="uip-flex uip-gap-xs">\
              <div class="material-icons-outlined">login</div>\
              <div class="uip-flex-grow">{{translations.lastLogin}}</div>\
              <div class="">{{panelData.user.uip_last_login_date}}</div>\
            </div>\
            <div class="uip-flex uip-gap-xs">\
              <div class="material-icons-outlined">public</div>\
              <div class="uip-flex-grow">{{translations.lastLoginCountry}}</div>\
              <div class="">{{panelData.user.uip_last_login_country}}</div>\
            </div>\
            <div class="uip-flex uip-gap-xs">\
              <div class="material-icons-outlined">article</div>\
              <div class="uip-flex-grow">{{translations.totalPosts}}</div>\
              <div class="">{{panelData.user.totalPosts}}</div>\
            </div>\
            <div class="uip-flex uip-gap-xs">\
              <div class="material-icons-outlined">comment</div>\
              <div class="uip-flex-grow">{{translations.totalComments}}</div>\
              <div class="">{{panelData.user.totalComments}}</div>\
            </div>\
          </div>\
          <!-- USER NOTES -->\
          <div class="uip-flex uip-flex-middle uip-flex-center uip-flex-between uip-margin-bottom-s uip-background-muted uip-border-rounded uip-padding-xs uip-border-round" v-if="panelData.user.notes != \'\'">\
            <div class="uip-flex uip-gap-xs">\
              <div class="uip-text-m uip-text-bold uip-flex-grow">{{translations.userNotes}}</div>\
            </div>\
            <div @click="ui.userNotesOpen = !ui.userNotesOpen ">\
              <div v-if="ui.userNotesOpen == true" class="uip-background-muted uip-border-round hover:uip-background-grey uip-cursor-pointer material-icons-outlined uip-padding-xxs" type="button">expand_more</div>\
              <div v-if="ui.userNotesOpen == false" class="uip-background-muted uip-border-round hover:uip-background-grey uip-cursor-pointer material-icons-outlined uip-padding-xxs" type="button">chevron_left</div>\
            </div>\
          </div>\
          <div v-if="ui.userNotesOpen == true && panelData.user.notes != \'\'" class="uip-padding-xs uip-flex uip-flex-column uip-margin-bottom-s">\
            <div v-html="panelData.user.notes"></div>\
          </div>\
          <!-- RECENT PAGE VIEWS -->\
          <div class="uip-flex uip-flex-middle uip-flex-center uip-flex-between uip-margin-bottom-s uip-background-muted uip-border-rounded uip-padding-xs uip-border-round">\
            <div class="uip-flex uip-gap-xs">\
              <div class="uip-text-m uip-text-bold uip-flex-grow">{{translations.recentPageViews}}</div>\
            </div>\
            <div @click="ui.pageViewsOpen = !ui.pageViewsOpen ">\
              <div v-if="ui.pageViewsOpen == true" class="uip-background-muted uip-border-round hover:uip-background-grey uip-cursor-pointer material-icons-outlined uip-padding-xxs" type="button">expand_more</div>\
              <div v-if="ui.pageViewsOpen == false" class="uip-background-muted uip-border-round hover:uip-background-grey uip-cursor-pointer material-icons-outlined uip-padding-xxs" type="button">chevron_left</div>\
            </div>\
          </div>\
          <div v-if="ui.pageViewsOpen" class="uip-padding-xs uip-flex uip-flex-column uip-margin-bottom-s">\
            <div v-if="panelData.recentPageViews.length == 0">{{translations.noActivity}}</div>\
            <div v-for="(view, index) in panelData.recentPageViews" class="uip-flex uip-gap-m uip-flex-center">\
              <div class="uip-text-muted uip-w-70 uip-flex-no-shrink uip-text-right uip-text-s">{{view.human_time}}</div>\
              <div class="uip-h-32" :class="{\'uip-flex uip-flex-right uip-flex-column\' : index == 0}">\
                <div :class="[{\'uip-h-32 uip-flex-center\' : index > 0 && index < panelData.recentPageViews.length - 1}, {\'uip-h-18 uip-flex-start\' : index == 0}, {\'uip-h-18 uip-flex-end uip-flex-vertical-middle \' : index == panelData.recentPageViews.length - 1}]"\
                class="uip-background-muted uip-w-2 uip-flex uip-flex-middle uip-overflow-visible">\
                  <div class="uip-w-4 uip-h-4 uip-border-circle uip-background-primary uip-position-absolute"></div>\
                </div>\
              </div>\
              <div class="uip-flex-grow">\
                <a class="uip-link-muted uip-text-bold uip-text-normal uip-no-underline" :href="view.url">{{returnViewTitle(view)}}</a>\
              </div>\
            </div>\
          </div>\
          <!-- Activity Log -->\
          <div class="uip-flex uip-flex-middle uip-flex-center uip-flex-between uip-margin-bottom-s uip-background-muted uip-border-rounded uip-padding-xs uip-border-round">\
            <div class="uip-flex uip-gap-xs">\
              <div class="uip-text-m uip-text-bold uip-flex-grow">{{translations.recentActivity}}</div>\
              <div class="uip-text-muted">{{panelData.history.totalFound}}</div>\
            </div>\
            <div @click="ui.activityOpen = !ui.activityOpen ">\
              <div v-if="ui.activityOpen == true" class="uip-background-muted uip-border-round hover:uip-background-grey uip-cursor-pointer material-icons-outlined uip-padding-xxs" type="button">expand_more</div>\
              <div v-if="ui.activityOpen == false" class="uip-background-muted uip-border-round hover:uip-background-grey uip-cursor-pointer material-icons-outlined uip-padding-xxs" type="button">chevron_left</div>\
            </div>\
          </div>\
          <div v-if="ui.activityOpen == true" class="uip-padding-xs uip-flex uip-flex-column">\
            <div v-if="panelData.history.totalFound == 0">{{translations.noActivity}}</div>\
            <div v-for="(view, index) in panelData.history.list" class="uip-flex uip-gap-m">\
              <div class="uip-text-muted uip-w-70 uip-flex-no-shrink uip-text-right uip-text-s">{{view.human_time}}</div>\
              <div class="">\
                <div class="uip-background-muted uip-w-2 uip-flex uip-flex-middle uip-overflow-visible uip-h-100p uip-margin-top-xxs"\
                :class="{\'uip-no-background\' : index == panelData.history.list.length - 1}">\
                  <div class="uip-w-5 uip-h-5 uip-border-circle uip-position-absolute"\
                  :class="[{\'uip-background-primary\' : view.type == \'primary\'}, {\'uip-background-orange\' : view.type == \'warning\'}, {\'uip-background-dark-red\' : view.type == \'danger\'}]"></div>\
                </div>\
              </div>\
              <div class="uip-flex-grow uip-margin-bottom-xs ">\
                <div class="uip-text-bold uip-text-normal uip-no-underline" >{{view.title}}</div>\
                <div class="uip-text-muted" v-html="view.meta"></div>\
                <div class="uip-flex uip-gap-xxs" >\
                  <template v-for="link in view.links">\
                    <a :href="link.url" class="uip-link-muted uip-link-no-underline">{{link.name}}</a>\
                  </template>\
                </div>\
              </div>\
            </div>\
            <div class="uip-flex uip-gap-xs uip-margin-top-s" v-if="recentActivity.totalPages > 1">\
              <button v-if="recentActivity.page > 1" class="uip-button-default" @click="changePage(\'previous\')">{{translations.previous}}</button>\
              <button class="uip-button-default" @click="changePage(\'next\')">{{translations.next}}</button>\
            </div>\
          </div>\
        </div>\
      </div>',
  };
}
