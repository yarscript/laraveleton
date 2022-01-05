<script>
import axios from "axios";
export default {

props:{
  
    availablepermissions:{
        type:Object,
        default:false
    }
},
  data() {
    return {
      settings: {
        minScrollbarLength: 60
      },
      selected_permissions:[],
      activeView:0,
      tablist:[]
    };
  },
  mounted(){
      this.load();
  },

  methods: {
      load(){
        var _this=this;
        const url=window.location.origin+'/admin/permissions/get-permissions/2';

        axios
        .get(url)
        .then(function(response){
            _this.tablist=response.data;
        });
      },
      savePermissions(){
        const _this=this;
        const role_id=this.tablist[this.activeView].id;
        const url=window.location.origin+'/admin/permissions/save-permissions/'+role_id;
        const allSelected= $(".tree-view-form").serialize();
         axios
      .post(url, allSelected)
      .then(function(response){
         console.log(response.data);
           window.flashMessages = [{'type': 'alert-success', 'message':'Permission updated successfully'}];

            _this.$root.addFlashMessages();
         _this.tablist[_this.activeView]['permissions']=response.data;
      });
      },
      updatePermissions(){
         
      },
      


  }
};
</script>
<template>
      <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <div class="content">
                       
                         <div class="page-header">
                              
                                 <div class="page-title">
                                    <h1>
                                      &nbsp;
                                    </h1>
                                </div>

                                <div class="page-action">
                                   
                                     <a href="javascript:void(0)" class="btn btn-lg btn-primary"
                                                            @click="savePermissions">{{ $t('Save Permissions') }}</a>
                                </div>
                            </div>
                        <div class="page-content">

                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
        
                                     

                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="nav flex-column nav-pills" style="height: 350px;" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                    <a :class="index===0?'nav-link mb-2 active':'nav-link mb-2'" 
                                                    :id="'v-pills-items.id-tab'" data-toggle="pill" 
                                                     :href="'#v-pills-'+index" role="tab" 
                                                     :aria-controls="'v-pills-'+index"
                                                    :key="index"
                                                    @click="activeView=index"
                                                    aria-selected="true" v-for="(items,index) in tablist">{{ items.name }}</a>
                                               
                                                </div>
                                               
                                            </div>
                                            
                                            <div class="col-md-9">
                                                <div class="tab-content text-muted mt-4 mt-md-0" id="v-pills-tabContent">
                                                    <div v-if="activeView==index" :class="index===0?'tab-pane fade active show':'tab-pane fade'" 
                                                    :id="'v-pills-'+index" role="tabpanel" 
                                                    :aria-labelledby="'v-pills-'+index+'-tab'"
                                                    v-for="(items,index) in tablist"
                                                    style="height:350px;overflow-y:scroll"
                                                    >
                                                         <form class="tree-view-form">
                                                        <tree-view value-field="key" 
                                                        :ref="'tree-'+index"
                                                      
                                                        id-field="key" :items='availablepermissions'
                                                        :value="items.permissions"
                                                      
                                                        v-on:change="updatePermissions"
                                                        v-on:input="updatePermissions"
                                                        ></tree-view>
                                                         </form>
                                                    </div>
                                                   
                                                   
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                             
                            </div>
                          
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</template